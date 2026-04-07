<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Models\OurService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\CreateOurServicesAction;
use App\Http\Requests\OurServices\UpdateOurServiceRequest;

class OurServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return to_route('admin.settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show( $location_id)
    {   (new CreateOurServicesAction)->execute();
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $location = Location::find($location_id);
        if(!isset($location)){
            return redirect()->back()->with('error', 'Location record does not exist');
        }

        $ourServices = OurService::where('location_id', $location_id)->latest()->get();
        //dd($ourServices);
        //dd(Location::where('id',1)->with('settings')->first());
        return view('admin.our-services.list', compact('ourServices', 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOurServicesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateOurServiceRequest $request)
    {
        if(!auth()->user()->isSuperAdmin()){
            abort('404');
        }
        $request->location_id = (int)  $request->location_id;
        $location = Location::select('id')->find($request->location_id);
        if(!isset($location)){
            return redirect()->route('admin.settings.index')->with('error', 'Location record not found for settings');
        }

        $data = [];
        foreach($request->our_services_ids as $key => $serviceId)
        { 
            $data['service_type_id'] = $request->service_type_ids[$key];
            $data['price'] = $request->price[$key];
            $data['status'] = isset($request->mystatus[$serviceId]) ? 1 : 0;
            $data['pvc_print_delivery_cost'] = 	$request->pvc_print_delivery_cost[$key] ?? 0;
            $data['location_id'] = $request->location_id;
            $data['allow_online_payment'] = isset($request->allow_online_payment[$serviceId]) ? 1 : 0;
            Ourservice::find((int)$serviceId)->update($data);  
             
        }

        return redirect()->back()->with('message', 'Services Saved Successful!');
    }

}
