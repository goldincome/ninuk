<?php
namespace App\Services;

use App\Models\ServiceType;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
class AddBookingToSessionService
{
    
    public function addBookingDataToSession(ServiceType $serviceType, $request)
    {
        $durationPerAppointment = config('settings.duration_per_appointment'.$serviceType->ourService->location_id);
        session()->forget('newcustomer');
        $data = $request->validated();
        $data['is_booking_appointment'] = ($request->date && $request->time) ? true : false;
        $bookedDateAndTime = $data['is_booking_appointment'] ? Carbon::createFromTimestamp(strtotime($request->date . $request->time)) : now();
        $data['children_count'] = $request->children_count ?? 1;
        
        $data['ref'] = generateRefNumber('appointment');//random_int(100000, 99999999);
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;
        $data['location_id'] = $serviceType->ourService->location_id;
        $data['card_type'] = $request->card_type;
        $data['slug'] = $serviceType->slug;
        $data['date'] =  $bookedDateAndTime;
        $data['start_time'] = $bookedDateAndTime->toTimeString();
        $data['end_time'] = $bookedDateAndTime->copy()->addMinutes($durationPerAppointment)->toTimeString();
        $data['duration'] = $durationPerAppointment;
        $data['quantity'] = $data['children_count'];
        $data['our_service_id'] = $serviceType->ourService->id;
        $data['service_type_id'] = $serviceType->id;
        $data['delivery_address'] = $request->delivery_address[$serviceType->slug] ?? null;
        $data['postal_code'] = $request->postal_code[$serviceType->ourService->serviceType->slug] ?? null;

        $data['amount'] = $serviceType->ourService->price;
        $data['pvc_print_delivery_cost'] = $serviceType->ourService->pvc_print_delivery_cost ?? 0;
        
        session(['newcustomer' => $data]);
        return $data;

    }
}