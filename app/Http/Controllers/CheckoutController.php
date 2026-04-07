<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Location;
use App\Models\OurService;
use App\Models\Appointment;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Enums\PaymentMethodEnum;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Services\AppointmentService;

class CheckoutController extends Controller
{
     protected $paymentService;


    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
        //$this->cartService = $cartService;
    }

    public function index()
    { 
        $newCustomer = session()->get('newcustomer');
        //dd($newCustomer);
        if(!isset($newCustomer)){
            return redirect()->back()->with('error', 'No service selected for checkout, please select a service to proceed to checkout');
        }
        $total = number_format($newCustomer['amount'] * $newCustomer['children_count'],2);
        
        try {
            $serviceType = ServiceType::where('slug', $newCustomer['slug'])->firstOrFail();
            $serviceType->load('ourService');
            $paymentMethods = PaymentMethodEnum::class;

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error no service to checkout: ')->withInput();
        }   
        return view('front.checkout.checkout', compact('serviceType', 'paymentMethods', 'newCustomer','total'));
    }

     /**
     * Process the payment based on the selected gateway.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {  
        // Validate the request
        $request->validate([
            'payment_method' => 'required|in:paypal,stripe,offline,takepayment',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:20',
        ]);
        $data = session()->get('newcustomer');
        if(!isset($data)){
            return redirect()->route('checkout.index')->with('error', 'No service selected for checkout, please select a service to proceed to checkout');
        }

        $ourService = OurService::where('id', $data['our_service_id'])->first();
        if(!isset($ourService)){
            return redirect()->route('checkout.index')->with('error', 'Service not found, please contact admin');
        }
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;
        $data['description'] = $ourService->serviceType->name.' for '. $data['children_count'].' person(s)'. ' for ref: '.$data['ref'];
        $data['quantity'] = $data['children_count'];
        $data['name'] = $ourService->serviceType->name;
        $data['payment_method'] = $request->payment_method;
        $data['total_amount'] = ($data['amount'] + $data['pvc_print_delivery_cost']) * $data['children_count'];
        //dd($data);
        session(['newcustomer' => $data]);
         
        try {
             //dd($request->all(), $request->payment_method, $data, PaymentMethodEnum::Offline->value);    
            if($request->payment_method === PaymentMethodEnum::Offline->value){
                $newCustSession = app(AppointmentService::class)->createAppointmentAndPaymentOrder('awaiting', PaymentMethodEnum::Offline->value);
                return to_route('checkout.success', $newCustSession['ref'])->with('success', 'Appointment created successfully, please visit our office to make payment.');
            }
            else{
                // Resolve the payment gateway dynamically based on payment_type
                $this->paymentService->setPaymentGateway($request->payment_method);
                // Process the payment
                $result = $this->paymentService->execute($data);
            }
            

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->route('checkout.index')->with('error','Payment processing failed, Something went wrong with PayPal')->withInput();
        }
    }

    public function paypalSuccess(Request $request)
    {
        $newCustomer = session()->get('newcustomer');
        if (!$newCustomer) {
            return redirect()->route('checkout.index')->with('error', 'No customer data found to make this order.');
        }
        if(Appointment::where('ref', $newCustomer['ref'])->exists()){
            return redirect()->route('bookingPreview', $newCustomer['ref'])->with('error', 'Your appointment has been created, check your email.');
        }
        $paymentMethod = $newCustomer['payment_method'];
        try {
            if ($request->has('token') && $paymentMethod === PaymentMethodEnum::PayPal->value) { 
                $paymentGateway = $this->paymentService->resolvePaymentGateway(PaymentMethodEnum::PayPal->value);
                $result = $paymentGateway->paymentSuccess($request);

                if ($result && $result['status'] === 'COMPLETED') {
                    $request['payment_method'] = PaymentMethodEnum::PayPal->value;
                    //$order = $orderService->createOrder($request->all());
                    $newCustSession = app(AppointmentService::class)->createAppointmentAndPaymentOrder('success', $paymentMethod ?? PaymentMethodEnum::PayPal->value);
                    //$newCustSession = createAppointmentAndPaymentOrder('success', $paymentMethod ?? PaymentMethodEnum::PayPal->value);  
                    return to_route('checkout.success', $newCustSession['ref'])->with('success', 'Payment successful!');
                    //return redirect()->route('checkout.success', $order)->with('success', 'Payment successful!');
                }
            }
            return redirect()->route('checkout.index')->with('error', 'Payment not successful');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->route('checkout.index')->with('error', 'Payment confirmation failed: ' . $e->getMessage());
        }
    }

    public function stripeSuccess(Request $request)
    {   
        $newCustomer = session()->get('newcustomer');
        if (!$newCustomer) {
            return redirect()->route('checkout.index')->with('error', 'No customer data found to make this order.');
        }
        if(Appointment::where('ref', $newCustomer['ref'])->exists()){
            return redirect()->route('bookingPreview', $newCustomer['ref'])->with('error', 'Your appointment has been created, check your email.');
        }
        $paymentMethod = $newCustomer['payment_method'];
        try {

            $paymentGateway = $this->paymentService->resolvePaymentGateway($paymentMethod);
            $result = $paymentGateway->paymentSuccess($request);
            $newCustSession = app(AppointmentService::class)->createAppointmentAndPaymentOrder('success', $paymentMethod ?? PaymentMethodEnum::Stripe->value);
            //$newCustSession = createAppointmentAndPaymentOrder('success', $paymentMethod ?? PaymentMethodEnum::Stripe->value);  
            return to_route('checkout.success', $newCustSession['ref'])->with('success', 'Payment successful!');
            //return redirect()->route('user.checkout.success', $order)->with('success', 'Payment successful!');
        } catch (\Exception $e) {   
            return redirect()->route('checkout.index')->with('error', 'Payment confirmation failed: ' . $e->getMessage());
        }
    }
    
    public function takepaymentSuccess(Request $request)
    {   
        $newCustomer = session()->get('newcustomer');
        if (!$newCustomer) {
            return redirect()->route('checkout.index')->with('error', 'No customer data found to make this order.');
        }
        if(Appointment::where('ref', $newCustomer['ref'])->exists()){
            return redirect()->route('bookingPreview', $newCustomer['ref'])->with('error', 'Your appointment has been created, check your email.');
        }
        $paymentMethod = $newCustomer['payment_method'];
        try {
            $paymentGateway = $this->paymentService->resolvePaymentGateway($paymentMethod);
            $result = $paymentGateway->paymentSuccess($request);
            $newCustSession = app(AppointmentService::class)->createAppointmentAndPaymentOrder('success', $paymentMethod ?? PaymentMethodEnum::Takepayment->value);
            //$newCustSession = createAppointmentAndPaymentOrder('success', $paymentMethod ?? PaymentMethodEnum::Takepayment->value);  
            return to_route('checkout.success', $newCustSession['ref'])->with('success', 'Payment successful!');
            //return redirect()->route('user.checkout.success', $order)->with('success', 'Payment successful!');
        } catch (\Exception $e) {
        
            //dd($e->getMessage());
            return redirect()->route('checkout.index')->with('error', 'Payment confirmation failed: ' . $e->getMessage());
        }
    }

    public function checkoutSuccess(string $ref)
    {  
        $appointment = Appointment::where('ref', $ref)->firstOrFail();
        if(!$appointment){
            return redirect()->route('checkout.index')->with('error', 'No appointment found for this reference.');
        }
        $appointment->load('payment');
        //dd($appointment, $appointment->details, $appointment->serviceType, $appointment->ourService);
        return view('front.checkout.success',compact('appointment'));
    }
    
    public function paymentCancelled()
    {
        //dd($request->all());
        return redirect()->route('checkout.index')->with('error','Payment was cancelled.');
    }
}
