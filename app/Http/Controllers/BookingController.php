<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Message;
use Carbon\Traits\Date;
use App\Models\Location;
use Carbon\CarbonPeriod;
use App\Models\OurService;
use App\Models\Appointment;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Models\ClosedDuration;
use App\Models\GeneralSetting;
use App\Models\OpeningDuration;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendBookingInvoiceMailable;
use App\Http\Requests\Flight\FlightBookingRequest;
use App\Http\Requests\Bookings\StoreBookingRequest;
use App\Http\Requests\Bookings\UpdateBookingRequest;
use Illuminate\Notifications\Events\NotificationSending;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('bookings.create');
    }

    public function flightTicket()
    {

        $locations = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->get();
        $serviceTypes = ServiceType::get();
        return view('flight-ticket', compact('locations', 'serviceTypes'));
    }

    public function processFlightTicket(FlightBookingRequest $request)
    {   //dd($request->all());
        $data = $request->validated();
        $newData = [];
        $newData['location_id'] = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->first()->id;
        $newData['subject'] = 'Flight Ticket Enquiry';
        $newData['name'] = $request->user_name;
        $newData['email'] = $request->user_email;
        $newData['phone'] = $request->user_phone;
        $returnDate = $request->trip_type == 'return' ? $request->return_date : '';
        $newData['message'] = "Trip Type: $request->trip_type </br>
                       Flying From: $request->flying_from </br> 
                       Flying To: $request->flying_to </br> 
                       No Of Adult: $request->num_of_adult </br>
                       Travel Class: $request->travel_class </br>
                       Flexi: $request->trip_method_flexi </br>
                       Direct: $request->trip_method_direct </br>
                       Departure Date: $request->depart_date </br> 
                       Return Date: $returnDate </br> 
                       No of Youth: $request->num_of_youth </br> 
                       No of Children: $request->num_of_children </br> 
                       No of Infant: $request->num_of_infant </br>";
                       
        $data['contactUs'] = Message::create($newData);

        try{
            Mail::send('emails.newContactUsMessageAdminNotification-backend', $data, function ($message){
                $message->to(config('app.admin_email'), 'NINUK');
                $message->bcc('alex@tegdaffy.co.uk', 'NINUK');
                $message->subject('New Flight Ticket Request -NINUK');
                $message->replyTo('info@ninuk.co.uk');
            });
        } catch(Throwable $e){
            $this->flashSuccessMessage('Flight Ticket Request Sent Successfully');
            return back();
        }

        $this->flashSuccessMessage('Flight Ticket Request  Sent Successfully');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $requestedServiceType = null;
        if($request->has('serviceType') && !empty($request->serviceType)){
            $requestedServiceType = ServiceType::where('slug', $request->serviceType)->first();
            if(!isset($requestedServiceType)){
                return redirect()->back()->with('error', 'Service type not found, please select a valid service type to proceed');
            }
        }

        $locations = Location::where('status', Location::LOCATION_STATUS_ACTIVE)->get();
        $serviceTypes = ServiceType::get();
        return view('book.index', compact('locations', 'serviceTypes', 'requestedServiceType'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {   //dd($request->all());
        $durationPerAppointment = config('settings.duration_per_appointment'.$request->location_id);
        $bookedDateAndTime = Carbon::createFromTimestamp(strtotime($request->date . $request->time));
        session()->forget('newcustomer');
        $data = [];
        $data['ref'] = generateRefNumber('appointment');//random_int(100000, 99999999);
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;
        $data['location_id'] = $request->location_id;
        $data['card_type'] = $request->card_type;
        $data['date'] =  $bookedDateAndTime;
        $data['start_time'] = $bookedDateAndTime->toTimeString();
        $data['end_time'] = $bookedDateAndTime->copy()->addMinutes($durationPerAppointment)->toTimeString();
        $data['duration'] = $durationPerAppointment;
        $data['amount'] = config('settings.nin_capture_price'.$request->location_id);
        $data['pvc_print_delivery_cost'] = $request->card_type == Appointment::CARD_TYPE_PVC ? config('settings.pvc_print_delivery_cost'.$request->location_id) : 0;
        $ourService = OurService::where('id', $request->our_service_id)->first();
        $data['our_service_id'] = $request->our_service_id;
        $data['service_type_id'] = $ourService->serviceType->id;
        $data['delivery_address'] = $request->delivery_address[$ourService->serviceType->slug] ?? null;
        $data['postal_code'] = $request->postal_code[$ourService->serviceType->slug] ?? null;
        $data['is_booking_appointment'] = true;
        //dd($data);
        //if($ourService->serviceType->slug != 'nin'){
            $data['amount'] = $ourService->price;
            $data['pvc_print_delivery_cost'] = $ourService->pvc_print_delivery_cost ?? 0;
        //}
        //dd($data);
        // $appointment = Appointment::create($data);
        // return back();
        session(['newcustomer' => $data]);
        // $slots = $this->generateTimeSlotArray($request->date, $openingDuration->start_time, $openingDuration->end_time, config('settings.duration_per_appointment'));
        return redirect()->route('bookings.show', $data['ref']);

    }

    public function generateTimeSlotArray($date, $startTime, $endTime,$intervalMinutes, $request)
    {
        $start =  Carbon::parse($date)->format('Y-m-d') . $startTime;
        $end =  Carbon::parse($date)->format('Y-m-d')  . $endTime;
        $period = new CarbonPeriod(new Carbon($start), $intervalMinutes.' minutes', new Carbon($end));
        $slots = [];
            $unAvailableTimeArray = $this->getUnavailableTime($request);
            foreach ($period as $item) {
                if(in_array($item->format("h:i A"), $unAvailableTimeArray)){
                    array_push($slots, ['status' => false, 'time' => $item->format("h:i A")]);
                }else{
                    array_push($slots, ['status' => true, 'time' => $item->format("h:i A")]);
                }
            }
        return $slots;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $newCustomer = session()->get('newcustomer');
        if(!isset($newCustomer)){
            return redirect()->route('bookings.create')->with('error', "Please, fill your details and submit to book for NIN capture");
        }
        $numberOfAccessPoints = config('settings.no_of_access_points_per_duration'.$newCustomer['location_id']);
        $appointmentCount = Appointment::where('date',$newCustomer['date'])->count();
        if($appointmentCount >=  $numberOfAccessPoints){
            return back()->withInput($newCustomer)->with('error' ,'Appointment time '. Carbon::parse($newCustomer['start_time'])->format('h:i A') .' on '. Carbon::parse($newCustomer['date'])->format('M d, Y') .' has been fully booked and not available');
        }
        $serviceType = ServiceType::select('name', 'slug')->where('id', $newCustomer['service_type_id'])->first();
        $newCustomer['appointmentDurationInMinutes'] = appointmentDurationInMinutes($newCustomer);

        //dd($newCustomer);
        return view('book.preview', compact('newCustomer', 'serviceType'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function displayBookedInformation($refno)
    {
        $appointment = Appointment::where('ref', (int)$refno)->first();
        if(!isset($appointment)){
            return redirect()->route('bookings.create')->with('error', 'Booking appointment record not found');
        }
        $appointment->date = Carbon::parse($appointment['date']);
        $data = [];
        $data['date'] =  $appointment->date;
        $data['start_time'] =  $appointment->state_time;
        $data['end_time'] =  $appointment->end_time;
        $appointment->appointmentDurationInMinutes = appointmentDurationInMinutes($data);
        $appointment->load('serviceType');
       
        return view('book.invoice', ['appointment' => $appointment]);
    }

    public function processManualBooking(Request $request)
    {
        $newCustomer = session()->get('newcustomer');
        if(!isset($newCustomer )){
            return redirect()->route('bookings.create')->with('error', 'Your appointment has been created, check your email.');
        }
        if(Appointment::where('ref', $newCustomer['ref'])->exists()){
            return redirect()->route('bookingPreview', $newCustomer['ref'])->with('error', 'Your appointment has been created, check your email.');
        }
        $newCustSession = createAppointmentAndPaymentOrder('awaiting', 'Offline');
             
        return to_route('bookingPreview', $newCustomer['ref']);
        //return view('book.status',  ['newCustomer' => $newCustSession ] );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function openingDuration($request)
    {
        $day = Carbon::parse($request->date)->format('l');
        $openingDuration = OpeningDuration::where('day_of_week',$day)->where('location_id', $request->location_id)->where('status', true)->first();
        if(!isset($openingDuration)){
            return ['status' => false, 'error' =>  "We do not work on ". $day.'s' ];
        }
        $closedDatesAndTime = $this->getClosedDurationTime($request->date, $request->location_id);
        if($closedDatesAndTime){
            return ['status' => false, 'error' =>  "We are on holiday on this date: ". $day. ', '.Carbon::parse($request->date)->format('d F, Y') ];
        }
        return $openingDuration;
    }

    public function getUnavailableTime($request)
    {
        $numberOfAccessPoints = config('settings.no_of_access_points_per_duration'.$request->location_id);
        $date = Carbon::parse($request->date);
        $bookedTimeArray = [];
        $allAppointmentsWithinDates = Appointment::whereDate('date','=', $date)->where('location_id', $request->location_id)->get();
        foreach( $allAppointmentsWithinDates as  $allAppointmentsWithinDate)
        {
             $appointment = Appointment::where('date',$allAppointmentsWithinDate->date)->where('status', '<>', Appointment::CANCELLED);
             $totalBookedInThisTime = $appointment->count();
             if($totalBookedInThisTime >=  $numberOfAccessPoints){
                 $appointment = $appointment->first();
                  array_push($bookedTimeArray, Carbon::parse($appointment->start_time)->format("h:i A"));
             }
        }
        return $bookedTimeArray;
    }

    public function geAvailableTimeSlots(Request $request){
       
        $setting = GeneralSetting::where('location_id', $request->location_id)->first(['nin_capture_price', 'pvc_print_delivery_cost'])->toArray();
        $openingDuration = $this->openingDuration( $request);
        $data = [];
        $today =  Carbon::now()->format('d F, Y');

        $service_type = ServiceType::select('service_types.id', 'service_types.name')
        ->leftJoin('our_services','our_services.service_type_id', '=' ,'service_types.id')
        ->where('our_services.location_id', $request->location_id)
        ->where('our_services.allow_online_payment',false)
        ->where('our_services.status', true)->groupBy('service_types.name', 'service_types.id')->get();


        if(isset($openingDuration->start_time)){
            $slots = $data['available_slot']  = $this->generateTimeSlotArray($request->date, $openingDuration->start_time, $openingDuration->end_time, config('settings.duration_per_appointment'.$request->location_id), $request);
            return response()->json(['status' => true, 'availableTime' => $slots, 'setting'=> $setting, 'meta' => $today, 'service_type' => $service_type]);
        }

       
       return response()->json(['status' => false, 'availableTime' => [], 'setting'=> $setting, 'error_message' => $openingDuration['error'], 'meta' => $today]);

    }
    public function getClosedDurationTime($date, int $location_id)
    {
        $date = date('Y-m-d', strtotime($date));
        $closedDuration = ClosedDuration::WhereDate('date_from', '<=', $date)->whereDate('date_to', '>=', $date)
            ->where('location_id', $location_id)->where('status', true)->latest()->first();
        
        //$timeSlices = $closedDuration ? $this->getClosedDurationTimeSliceArray($timeSlicesJson, $date) : [];
        return $closedDuration ? true : false; //$timeSlices;
    }

    public function getAvailableService(Request $request){

        $service_type = ServiceType::select('our_services.id', 'service_types.name')
        ->leftJoin('our_services','our_services.service_type_id', '=' ,'service_types.id')
        ->where('our_services.location_id', $request->location_id)
        ->where('our_services.allow_online_payment',false)
        ->where('our_services.status', true)->groupBy('service_types.name', 'our_services.id')->get();


        if(isset($service_type)){
            return response()->json(['status' => true,  'service_type' => $service_type]);
        }
 
       return response()->json(['status' => false,  'error_message' => 'No record found']);

    }
    
    //getting one servive from Our Servives using ajax from booking form
    public function getSingleService(Request $request){

        $ourService = OurService::where('id', $request->service_id)->first();
        $slug = $ourService->serviceType->slug;
        $ourService = $ourService->toArray();
        $service_type = ServiceType::get();
        if(isset($ourService )){
            return response()->json(['status' => true,  'our_service' => $ourService, 'slug' => $slug, 'service_type' => $service_type]);
        }
 
       return response()->json(['status' => false,  'error_message' => 'No Service record found']);

    }


}