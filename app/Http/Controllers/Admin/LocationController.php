<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Http\Controllers\Controller;
use Cache;
use App\Http\Requests\Locations\StoreLocationRequest;
use App\Http\Requests\Locations\UpdateLocationRequest;

class LocationController extends Controller
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
        $locations = Location::latest()->paginate($this::PAGINATE_COUNT);
        //dd(Location::where('id',1)->with('settings')->first());
        return view('admin.locations.list', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $location = Location::create($request->validated());
        createDefaultSettingAndOpeningDurationForLocation($location); //function from helper
        return redirect()->route('admin.locations.index')->with('message', 'Location creation successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        if(!isset($location)){
            return redirect()->route('admin.locations.index')->with('error', 'Location record does not exist');
        }

        return view('admin.locations.edit', ['location' => $location]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $location = $location->update($request->validated());
        if(!isset($location)){
            return redirect()->route('admin.locations.index')->with('error', 'Location record does not exist');
        }
        return redirect()->route('admin.locations.index')->with('message', 'Location update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
    
        try{
            $location->openingDurations()->delete();
            $location->setting()->delete();
            Cache::forget('settings');
            $location->delete();
        }
        catch(\Throwable $e){
            return redirect()->route('admin.locations.index')->with('error', 'Location record does not exist');
        }
        return redirect()->route('admin.locations.index')->with('message', 'Location delete successful');
    }
}
