<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Location;
use App\Models\OpeningDuration;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpeningDurations\StoreOpeningDurationRequest;
use App\Http\Requests\OpeningDurations\UpdateOpeningDurationRequest;

class OpeningDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('admin.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOpeningDurationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOpeningDurationRequest $request)
    { //dd( $request->start_time);
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $request->location_id = (int)  $request->location_id;
        $location = Location::select('id')->find($request->location_id);
        if(!isset($location)){
            return redirect()->route('admin.settings.index')->with('error', 'Location record does not found for settings');
        }

        $data = [];
        foreach($request->duration_ids as $key => $durationId)
        { 
            $data['start_time'] = $request->start_time[$key];
            $data['end_time'] = $request->end_time[$key];
            $data['status'] = true;
            $data['total_mins'] = Carbon::parse($data['end_time'])->diffInMinutes(Carbon::parse($data['start_time']));
            $data['total_mins'] = $location->id;
            OpeningDuration::find((int)$durationId)->update($data);

            
        }
        $inActiveOpeningDurations = OpeningDuration::where('location_id', $request->location_id)->whereNotIn('id',$request->day_of_week )->update(['status' => false]);
        return redirect()->route('admin.settings.edit', $request->location_id)->with('message', 'Settings Saved Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpeningDuration  $openingDuration
     * @return \Illuminate\Http\Response
     */
    public function show(OpeningDuration $openingDuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpeningDuration  $openingDuration
     * @return \Illuminate\Http\Response
     */
    public function edit(OpeningDuration $openingDuration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOpeningDurationRequest  $request
     * @param  \App\Models\OpeningDuration  $openingDuration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpeningDurationRequest $request, OpeningDuration $openingDuration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpeningDuration  $openingDuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpeningDuration $openingDuration)
    {
        //
    }
}
