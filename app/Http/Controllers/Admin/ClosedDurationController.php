<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Location;
use Carbon\CarbonPeriod;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\ClosedDuration;
use App\Models\GeneralSetting;
use App\Models\OpeningDuration;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClosedDurations\StoreClosedDurationRequest;
use App\Http\Requests\ClosedDurations\UpdateClosedDurationRequest;

class ClosedDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $closedDurations = ClosedDuration::latest()->paginate($this::PAGINATE_COUNT);
        return view('admin.closed-duration.list', compact('closedDurations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::where('status', true)->get();
        return view('admin.closed-duration.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClosedDurationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClosedDurationRequest $request)
    {  
        if($this->checkExistingClosedDateEntry($request->date_to, $request->location_id))
        {
            return redirect()->back()->with('error', "This date : ".Carbon::parse($request->date_to)->format('d F, Y'). ' is already existing');
        }
        $timeInterval = config('settings.duration_per_appointment'.$request->location_id);
        $time_slices = $this->generateTimeSliceArray($timeInterval, $request);
        
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        //$request->merge(['time_slices' => json_encode($time_slices)]);
        $request->location_id = (int)  $request->location_id;
        $location = Location::find($request->location_id);
        if(!isset($location)){
            return redirect()->back()->with('error', 'Location record not found');
        }
        
        ClosedDuration::create(array_merge($request->validated(), ['time_slices' => json_encode($time_slices)]));

        return redirect()->route('admin.closed-durations.index')->with('message', 'Closed Date created Successful!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClosedDuration  $ClosedDuration
     * @return \Illuminate\Http\Response
     */
    public function show(ClosedDuration $closedDuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClosedDuration  $closedDuration
     * @return \Illuminate\Http\Response
     */
    public function edit(ClosedDuration $closedDuration)
    {
        $locations = Location::where('status', true)->get();
        return view('admin.closed-duration.edit', compact('locations', 'closedDuration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClosedDurationRequest  $request
     * @param  \App\Models\ClosedDuration  $closedDuration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClosedDurationRequest $request, ClosedDuration $closedDuration)
    {
        $timeInterval = config('settings.duration_per_appointment'.$request->location_id);
        $time_slices = $this->generateTimeSliceArray($timeInterval, $request);
        $closedDuration = $closedDuration->update(array_merge($request->validated(), ['time_slices' => json_encode($time_slices)]));
        if(!isset($closedDuration)){
            return redirect()->route('admin.closed-durations.index')->with('error', 'Closed Date record does not exist');
        }
        return redirect()->route('admin.closed-durations.index')->with('message', 'Closed Date updated Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClosedDuration  $closedDuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClosedDuration $closedDuration)
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
    
        try{
            $closedDuration->delete();
        }
        catch(\Throwable $e){
            return redirect()->route('admin.closed-durations.index')->with('error', 'Closed Date record does not exist');
        }
        return redirect()->route('admin.closed-durations.index')->with('message', 'Closed Date delete successful');
    
    }

    public function generateTimeSliceArray($intervalMinutes, $request)
    {
        $slots = [];
        $dateRanges = $this->getDateRange($request->date_from, $request->date_to);
        foreach($dateRanges as $dateRange){

            $start =  Carbon::parse($dateRange)->format('Y-m-d') . '00:00';
            $end =  Carbon::parse($dateRange)->format('Y-m-d')  . '24:00';
            $periods = CarbonPeriod::create($start, $intervalMinutes.' minutes', $end);
                $timeSlices = [];
                foreach ($periods as $period) {

                    array_push($timeSlices,  $period->format("h:i A") );
                
                }
                array_push($slots,  [$dateRange => $timeSlices] );
        }

        return $slots;
    }

    public function getDateRange($startDate, $endDate)
    {
        $startDate = new Carbon($startDate);
        $endDate = new Carbon($endDate);
        $all_dates = array();
        while ($startDate->lte($endDate)){
        $all_dates[] = $startDate->toDateString();

        $startDate->addDay();
        }
        return $all_dates;
    }

    public function checkExistingClosedDateEntry($date, int $location_id) : bool
    {
        $date = date('Y-m-d', strtotime($date));
        $closedDuration = ClosedDuration::WhereDate('date_to', '=', $date)
            ->where('location_id', $location_id)->where('status', true)->latest()->first();
        
        return $closedDuration ? true : false ;
    }

    public function getClosedDurationTime($date, int $location_id)
    {
        $bookedTimeArray = [];
        $date = date('Y-m-d', strtotime($date));
        //$closedDuration = ClosedDuration::WhereDate('date_from', '<=', $date)->whereDate('date_to', '>=', $date)
          //  ->where('location_id', $location_id)->where('status', true)->latest()->first();
        //dd($closedDuration ?? 'No');
        $timeSlicesJson = ClosedDuration::WhereDate('date_from', '<=', $date)->whereDate('date_to', '>=', $date)
            ->where('location_id', $location_id)->where('status', true)->latest()->first()->time_slices;
        
        $timeSlices = $timeSlicesJson ? $this->getClosedDurationTimeSliceArray($timeSlicesJson, $date) : [];
        return $timeSlices;
    }


    public function getClosedDurationTimeSliceArray($time_slices, $date)
    {
        $time_slices = json_decode($time_slices, true);
        foreach($time_slices as $time_slice => $values)
        {
            //dd($time_slices[$time_slice], $values[$request->date_from]);
            foreach($values as $id => $value){
                if($id == $date){
                    //dd($id, $value);
                    return $value;
                }
            }
        }
        return [];
    }

}
