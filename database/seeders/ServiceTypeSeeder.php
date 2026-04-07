<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceTypes = [
                    [
                        'id' => ServiceType::NIN_DEFAULT_ID,
                        'slug' => 'nin',
                        'name' => 'NIN',
                        'description' => 'For National Identity Card processing'
                    ],
            
                    [
                        'id' => 2,
                        'slug' => 'bvn',
                        'name' => 'BVN',
                        'description' => 'For BVN processing'
                    ],

                    [
                        'id' => 3,
                        'slug' => 'bank-account',
                        'name' => 'Bank Account',
                        'description' => 'For Bank Account Opening'
                    ],

                    [   
                        'id' => 4,
                        'slug' => 'bvn-personal-bank-account',
                        'name' => 'BVN and Personal Bank Account',
                        'description' => 'For BVN and Bank Account Opening'
                    ],

                    [   
                        'id' => 5,
                        'slug' => 'bvn-corporate-bank-account',
                        'name' => 'BVN and Corporate Bank Account',
                        'description' => 'For BVN and Bank Account Opening'
                    ],
                    
                    [
                        'id' => 6,
                        'slug' => 'passport-application-5-years',
                        'name' => 'Nigerian Passport Application 5 Years Booklet',
                        'description' => 'Process Nigerian Passport Application For 5 Years'
                    ],

                    [
                        'id' => 7,
                        'slug' => 'passport-application-10-years',
                        'name' => 'Nigerian Passport Application 10 Years Booklet',
                        'description' => 'Process Nigerian Passport Application For 10 Years'
                    ],

                    [
                        'id' => 8,
                        'slug' => 'npc-attestation-birth-certificate',
                        'name' => 'Nigerian Population Commission Attestation Birth Certificate',
                        'description' => 'Process Nigerian Population Commission Attestation Birth Certificate'
                    ],
                    [
                        'id' => 9,
                        'slug' => 'tax-identification-number-tax-card',
                        'name' => 'Tax Identification Number Tax Card',
                        'description' => 'Process Tax Identification Number-Tax Card'
                    ],
                     [
                        'id' => 10,
                        'slug' => 'npc-notification-birth-certificate',
                        'name' => 'Nigerian Population Commission Notification Birth Certificate',
                        'description' => 'Process Nigerian Population Commission Notification Birth Certificate'
                    ]   
        ];

        foreach ($serviceTypes as  $serviceType) {
            ServiceType::firstOrCreate([
                'slug' => $serviceType['slug'],
            ], $serviceType);
        }

    }
}
