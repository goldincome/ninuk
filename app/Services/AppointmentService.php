<?php
namespace App\Services;

use App\Enums\PaymentMethodEnum;
use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendPaidBookingMailable;

class AppointmentService
{
    
    public function __construct()
    {
        // Initialize any dependencies or configurations here
    }

    public function createAppointmentAndPaymentOrder($statusType, $paymentType)
    { 
        $newCustomer = session()->get('newcustomer');

        $newCustomer['details'] = $this->prepareAppointmentDetails($newCustomer);
        $newCustomer['amount'] = $newCustomer['quantity'] ? ($newCustomer['quantity'] * $newCustomer['amount']) + $newCustomer['pvc_print_delivery_cost'] : $newCustomer['amount'] + $newCustomer['pvc_print_delivery_cost'];
        $newCustomer['delivery_cost'] = $newCustomer['pvc_print_delivery_cost'];
        
        unset(
            $newCustomer['pvc_print_delivery_cost'],
            $newCustomer['payment_method'],
            $newCustomer['name'],
            $newCustomer['description'],
            $newCustomer['quantity'], 
            $newCustomer['total_amount'],
            $newCustomer['slug'],
            $newCustomer['birth_location'],
            $newCustomer['applying_for'],
            $newCustomer['children_count'],
            $newCustomer['company_name'],
            $newCustomer['is_booking_appointment'],
        );
        if($statusType === 'failed'){
            $newCustomer['status'] = Appointment::PAYMENT_FAILED;
        }
        if($statusType === 'awaiting'){
            $newCustomer['status'] = Appointment::TOPAYONCAPTURE;
        }
        try{
            $appointment = Appointment::create($newCustomer);
        }catch(\Exception $e){
            
        }
            $data = [];
            if($appointment){
                $data['payment_ref_no'] = generateRefNumber('payment');
                $data['amount_paid'] = $newCustomer['amount'];
                $data['payment_gateway'] = $paymentType; 
                $data['appointment_id'] = $appointment->id;
                if($statusType === 'success'){
                    $data['payment_status'] = Payment::PAYMENTSTATUS['completed'];
                }
                elseif($statusType === 'failed'){
                    $data['payment_status'] = Payment::PAYMENTSTATUS['failed'];
                }
                else{
                    $data['payment_status'] = Payment::PAYMENTSTATUS['awaiting'];
                }
                Payment::create($data);
            }
          return  $this->sendBookingAppointmentEmail($appointment, $paymentType);
    }

    private function sendBookingAppointmentEmail($appointment, $paymentType)
    {
        $newCustomer = session()->get('newcustomer');
        $newCustSession = $newCustomer ;
        $newCustSession['appointmentDurationInMinutes'] = appointmentDurationInMinutes($newCustomer);
        $appointment->load('serviceType', 'ourService');
        $newCustSession['appointment'] = $appointment;
        $newCustSession['payment_type'] = $paymentType;
        //send booking confirmation email to user
        Mail::send( new sendPaidBookingMailable($newCustSession ));
        session()->forget('newcustomer');
        return $newCustSession ;
    }

    public function prepareAppointmentDetails($data)
    {
       return json_encode( [
            'amount' => $data['amount'],
            'delivery_cost' => $data['pvc_print_delivery_cost'],
            'children_count' => $data['children_count'] ?? 1,
            'description' => $data['description'] ?? null,
            'quantity' => $data['quantity'] ?? 1,
            'name' => $data['name'] ?? null,
            'slug' => $data['slug'] ?? null,
            'birth_location' => $data['birth_location'] ?? null,
            'applying_for' => $data['applying_for'] ?? 'myself',
            'company_name' => $data['company_name'] ?? null,
            'payment_method' => $data['payment_method'] ?? PaymentMethodEnum::Offline->value,
            'total_amount' => $data['total_amount'] ?? null,
            'is_booking_appointment' => $data['is_booking_appointment'] ?? true,

       ]);
        
    }
}