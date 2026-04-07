<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\ReminderSetting;
use App\Models\AppointmentReminder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ReminderSettings\StoreReminderSettingRequest;
use App\Http\Requests\ReminderSettings\UpdateReminderSettingRequest;

class ReminderSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $reminderSettings = ReminderSetting::latest()->paginate($this::PAGINATE_COUNT);
        return view('admin.reminder-setting.list', compact('reminderSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.reminder-setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReminderSettingRequest $request)
    {
        if($this->checkRepeatedEntry($request->number_of_days))
        {
            return redirect()->back()->with('error', "This record, Number of days : ".$request->number_of_days. ' is already existing');
        }
        ReminderSetting::create($request->validated());
        return redirect()->route('admin.reminder-setting.index')->with('message', 'Reminder Notification created Successful!');
    } 

    /**
     * Display the specified resource.
     */
    public function show(ReminderSetting $reminderSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReminderSetting $reminderSetting)
    {
        return view('admin.reminder-setting.edit', compact( 'reminderSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReminderSettingRequest $request, ReminderSetting $reminderSetting)
    {
  
        $reminderSetting = $reminderSetting->update($request->validated());
        if(!isset($reminderSetting)){
            return redirect()->route('admin.reminder-setting.index')->with('error', 'Email Notification Setting record does not exist');
        }
        return redirect()->route('admin.reminder-setting.index')->with('message', 'Email Notification Setting updated Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReminderSetting $reminderSetting)
    {
        try{
            $reminderSetting->delete();
        }
        catch(\Throwable $e){
            return redirect()->route('admin.reminder-setting.index')->with('error', 'Email Notification Setting record does not exist');
        }
        return redirect()->route('admin.reminder-setting.index')->with('message', 'Email Notification Setting delete successful');
    }


    public function checkRepeatedEntry($number_of_days) : bool
    {
        $reminderSetting = ReminderSetting::Where('number_of_days',  $number_of_days)->first();
        
        return $reminderSetting ? true : false ;
    }

}
