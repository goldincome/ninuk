<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'location_name' =>  'London',
                'location_address' => '123 London new address',
                'contact_phone' => '187111111',
                'contact_name' => 'London Office Ade London',
                'contact_email' => 'london@mailinator.com'
            ],
            [
                'location_name' =>  'Manchester',
                'location_address' => '123 Manchester new address',
                'contact_phone' => '287457422222',
                'contact_name' => 'Manchester  Ade Location',
                'contact_email' => 'manchester@mailinator.com'
            ],
            [
                'location_name' =>  'Scotland',
                'location_address' => '123 Scotland new address',
                'contact_phone' => '38745333333',
                'contact_name' => 'Scotland  Ade Location',
                'contact_email' => 'scotland@mailinator.com'
            ],

        ];

        foreach ($locations as  $location) {
            Location::firstOrCreate([
                'location_name' => $location['location_name'],
            ], $location);
        }

    }
}
