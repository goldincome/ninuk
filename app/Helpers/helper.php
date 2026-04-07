<?php

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Location;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendBookingInvoiceMailable;
use App\Services\AppointmentService;

if (!function_exists("generateRefNumber")) {
    function generateRefNumber($refType = null) {
        $number = mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the barcode exists already
        if (refNumberExists($refType, $number)) {
            return generateRefNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function refNumberExists($refType, $number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        if($refType === 'payment'){
            return Payment::where('payment_ref_no',$number)->exists();
        }
        elseif($refType === 'appointment'){
            return Appointment::where('ref',$number)->exists();
        }
    }
}

if (!function_exists("appointmentDurationInMinutes")) {
    function appointmentDurationInMinutes(array $data)
    {
        $start =  Carbon::parse($data['start_time']);
        $end =  Carbon::parse($data['end_time']);
        return $end->diffInMinutes($start);
    }
}

if(!function_exists("createDefaultSettingAndOpeningDurationForLocation"))
{
    function createDefaultSettingAndOpeningDurationForLocation(Location $location)
    {
        $data = [];

        $data['allow_appointment_booking'] = 'yes';
        $data['duration_per_appointment'] =  30;
        $data['no_of_access_points_per_duration'] =  1;
        $data['nin_capture_price'] = 50;
        $data['pvc_print_delivery_cost'] = 9;
        $location->setting()->create($data);

        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $data = [];
        //\DB::beginTransaction();
        foreach($days as $day){
            $data['day_of_week'] =  $day;
            $data['start_time'] =  '00:00:00';
            $data['end_time'] =  '09:00:00';
            $data['total_mins'] = 0;
            $data['status'] = true;
            $location->openingDuration()->create($data);  
        }
    }
}

if(!function_exists("createAppointmentAndPaymentOrder"))
{ 
    function createAppointmentAndPaymentOrder($statusType, $paymentType)
    {
        $newCustomer = session()->get('newcustomer');
        $newCustomer['details'] = app(AppointmentService::class)->prepareAppointmentDetails($newCustomer);
        $newCustomer['amount'] = isset($newCustomer['quantity']) ? ($newCustomer['quantity'] * $newCustomer['amount']) + $newCustomer['pvc_print_delivery_cost'] : $newCustomer['amount'] + $newCustomer['pvc_print_delivery_cost'];
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
            $newCustomer['time'],
            $newCustomer['is_booking_appointment'],
        );
        if($statusType === 'failed'){
            $newCustomer['status'] = Appointment::PAYMENT_FAILED;
        }
        if($statusType === 'awaiting'){
            $newCustomer['status'] = Appointment::TOPAYONCAPTURE;
        }
        $appointment = Appointment::create($newCustomer);
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
          return  sendBookingAppointmentEmail($appointment, $paymentType);
        //return $appointment;
    }
}

if(!function_exists("sendBookingAppointmentEmail"))
{ 
    function sendBookingAppointmentEmail($appointment, $paymentType)
    {
        $newCustomer = session()->get('newcustomer');
        $newCustSession = $newCustomer ;
        $newCustSession['appointmentDurationInMinutes'] = appointmentDurationInMinutes($newCustomer);
        $newCustSession['appointment'] = $appointment;
        $newCustSession['payment_type'] = $paymentType;
        //send booking confirmation email to user
        Mail::send( new sendBookingInvoiceMailable($newCustSession ));
        session()->forget('newcustomer');
        return $newCustSession ;
    }
}