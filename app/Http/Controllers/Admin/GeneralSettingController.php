<?php

namespace App\Http\Controllers\Admin;

use Cache;
use App\Models\Location;
use App\Models\OurService;
use App\Models\GeneralSetting;
use App\Models\OpeningDuration;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralSettings\StoreGeneralSettingRequest;
use App\Http\Requests\GeneralSettings\UpdateGeneralSettingRequest;


class GeneralSettingController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth',[]);
    }
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
        $locations = Location::where('status', true)->latest()->paginate($this::PAGINATE_COUNT);
        return view('admin.settings.index', compact('locations'));
        
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
     * @param  \App\Http\Requests\StoreGeneralSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralSettingRequest $request)
    {
        $generalSettings = GeneralSetting::create($request->validated());
        Cache::forget('settings');
        return redirect()->route('admin.settings.index')->with('message', 'Settings Saved Successful!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $location = Location::with('setting','openingDurations')->find($id);
        if(!isset($location)){
            return redirect()->route('admin.settings.index')->with('error', 'Location record does not exist');
        }
        $openingDurations = $location->openingDurations;
        $generalSettings = $location->setting;
        

        return view('admin.settings.list', compact('generalSettings', 'openingDurations', 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneralSettingRequest  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralSettingRequest $request, int $id)
    {   
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $location = Location::with('setting')->find($id);
        if(!isset($location)){
            return redirect()->route('admin.settings.index')->with('error', 'Location record does not found for settings');
        }
        $location->setting()->update($request->validated());
        Cache::forget('settings');
        return redirect()->route('admin.settings.edit', $id)->with('message', 'Settings Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
