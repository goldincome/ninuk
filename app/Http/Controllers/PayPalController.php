<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendBookingInvoiceMailable;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('front.paypal-transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $newCustomer = session()->get('newcustomer');
        if(!isset($newCustomer)){
            return redirect()->route('bookings.create')->with('error', "Please, fill your details and submit to book for NIN capture");
        }
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('GBP');
        $paypalToken = $provider->getAccessToken();
        $isPvcRequested = ($newCustomer['card_type']  === Appointment::CARD_TYPE_PVC) ? true : false;
        if($isPvcRequested )
        {
            $pvcDeliveryFee = config('settings.pvc_print_delivery_cost'.$newCustomer['location_id']);
        }
        else{
            $pvcDeliveryFee = 0;
        }
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "description"  => 'Booking For NIN Capture for ReferenceNo: '.$newCustomer['ref'].
                    ($isPvcRequested) ? ' and PVC print out with delivery fee of £'.$pvcDeliveryFee  : '',
                    "reference_id"=> $newCustomer['ref'],
                    'invoice_id' => $newCustomer['ref'],
                    "amount" => [
                        "currency_code" => "GBP",
                        "value" => config('settings.nin_capture_price'.$newCustomer['location_id']) + $pvcDeliveryFee //get the booking price from config
                    ],
                    "shipping" =>[
                        "name" => ['full_name' => $newCustomer['user_name']] 
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href'])->send();
                }
            }

            return redirect()
                ->route('bookings.show',$newCustomer['ref'])
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('bookings.show',$newCustomer['ref'])
                ->with('error', 'Could not connect to the Payment gateway. Try again below.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {        
        $newCustomer = session()->get('newcustomer');
        if(isset($newCustomer)){
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);
            
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                //create the order record in DB
                $newCustSession = createAppointmentAndPaymentOrder('success', 'Paypal');
                // $newCustSession = $newCustomer ;
                // $newCustSession['appointmentDurationInMinutes'] = appointmentDurationInMinutes($newCustomer);
                // $newCustSession['appointment'] = $appointment;
                // session()->forget('newcustomer');

                // //send booking confirmation email to user
                // Mail::send( new sendBookingInvoiceMailable($newCustSession ));
                

                return view('book.status',  ['newCustomer' => $newCustSession ] );
            } else {
                createAppointmentAndPaymentOrder('failed', 'Paypal');
                return redirect()
                    ->route('bookings.show',$newCustomer['ref'])
                    ->with('error', 'Something went wrong or server timed out or payment gateway not responding');
            }
        }
        
        else{
            return redirect()->route('bookings.create');
            exit;
        }

        //session()->push('newcustomer.order_id', $response['id']);
            //dd($newCustomer );
            //$order_id = $newCustomer['order_id'][0];
            // $order = $provider->showOrderDetails($order_id);
            // dd($newCustomer , $order );
    }

    
    // public function createAppointmentAndPaymentOrder($statusType)
    // {
    //     $newCustomer = session()->get('newcustomer');
    //     $newCustomer['amount'] = $newCustomer['amount'] + $newCustomer['pvc_print_delivery_cost'];
    //     $newCustomer['delivery_cost'] = $newCustomer['pvc_print_delivery_cost'];
    //     unset($newCustomer['pvc_print_delivery_cost']);
    //     if($statusType === 'failed'){
    //         $newCustomer['status'] = Appointment::PAYMENT_FAILED;
    //     }
    //     $appointment = Appointment::create($newCustomer);
    //         $data = [];
    //         if($appointment){
    //             $data['payment_ref_no'] = generateRefNumber('payment');
    //             $data['amount_paid'] = $newCustomer['amount'];
    //             $data['payment_gateway'] = 'Paypal'; 
    //             $data['appointment_id'] = $appointment->id;
    //             $data['payment_status'] = $statusType === 'success' ? Payment::PAYMENTSTATUS['completed'] : Payment::PAYMENTSTATUS['failed'];
    //             Payment::create($data);
    //         }
    //     return $appointment;
    // }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        $newCustomer = session()->get('newcustomer');
        //$this->createAppointmentAndPaymentOrder('cancelled');
        return redirect()
            ->route('bookings.show',$newCustomer['ref'])
            ->with('error', 'You have canceled your booking transaction. You can continue below');
            
    }
}

