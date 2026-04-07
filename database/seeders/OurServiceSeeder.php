<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\OurService;
use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class OurServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $data['service_type_id'] = ServiceType::NIN_DEFAULT_ID;
        $data['price'] =  30;
        $locations = Location::select('id')->get();

        foreach ($locations as $location) {
            OurService::firstOrCreate([
                'location_id' =>  $location->id,
            ], $data);
        }
    }

}
