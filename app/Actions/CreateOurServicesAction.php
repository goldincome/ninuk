<?php
namespace App\Actions;

use App\Models\Location;
use App\Models\OurService;
use App\Models\ServiceType;

class CreateOurServicesAction
{

    public function __construct()
    {
        
    }

    public function execute()
    {
        $locations = Location::select('id')->get();
        if(count($locations) > 0){
            foreach($locations as $location){
                $serviceTypes = ServiceType::select('id')->get();
                foreach($serviceTypes as $serviceType){
                    $data = [];
                    $data['service_type_id'] = $serviceType->id;
                    $data['price'] =  0;
                    $data['status'] = 0;
                    $data['location_id'] =  $location->id;

                    $ourService = OurService::where('location_id', $location->id)
                        ->where('service_type_id', $serviceType->id)->first();
                    if(!$ourService){
                        OurService::create($data);
                    }
                }

            }
        }
    }
}