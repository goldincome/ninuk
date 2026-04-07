<?php

namespace App\Http\Controllers\Admin;


use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceTypes\UpdateServiceTypeRequest;

class ServiceTypeController extends Controller
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
        $serviceTypes = ServiceType::latest()->get();
        return view('admin.service-types.list', compact('serviceTypes'));
        
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
        $serviceType= ServiceType::find($id);
        if(!isset($serviceType)){
            return redirect()->route('admin.service-types.index')->with('error', 'Service Type record does not exist');
        }

        return view('admin.service-types.edit', compact('serviceType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceTypeRequest $request, int $id)
    {   
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }

        $serviceType= ServiceType::find($id);
        if(!isset($serviceType)){
            return redirect()->route('admin.service-types.index')->with('error', 'Service Type record not found');
        }
        
        $serviceType->update($request->validated());
        return redirect()->route('admin.service-types.index', $id)->with('message', 'Service Type Update Successful!');
    }
}
