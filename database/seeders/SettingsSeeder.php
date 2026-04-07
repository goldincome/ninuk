<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $data['allow_appointment_booking'] = 'yes';
        $data['duration_per_appointment'] =  30;
        $data['no_of_access_points_per_duration'] =  1;
        $data['nin_capture_price'] = 50;
        $locations = Location::select('id')->get();

        foreach ($locations as $location) {
            GeneralSetting::firstOrCreate([
                'location_id' =>  $location->id,
            ], $data);
        }
    }

}
