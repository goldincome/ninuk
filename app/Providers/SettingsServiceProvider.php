<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $cache, GeneralSetting $settings)
    {
        if($settings->count() > 0){
            $settings = $cache->remember('settings', 60, function() use ($settings)
            {

                $allSetting = $settings->all();
                $data = [];
                foreach($allSetting as $key => $setting){
                    $data['nin_capture_price'.$setting->location_id] = $setting->nin_capture_price;
                    $data['no_of_access_points_per_duration'.$setting->location_id] = $setting->no_of_access_points_per_duration;
                    $data['duration_per_appointment'.$setting->location_id] = $setting->duration_per_appointment;
                    $data['allow_appointment_booking'.$setting->location_id] = $setting->allow_appointment_booking;
                    $data['pvc_print_delivery_cost'.$setting->location_id] = $setting->pvc_print_delivery_cost;
                }
                return $data;
            });
            config()->set('settings', $settings);
        }
    }
}
