<?php

namespace App\Models;

use App\Models\Appointment;
use App\Models\OpeningDuration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    const LOCATION_STATUS_ACTIVE = 1;
    const LOCATION_STATUS_DISABLE = 0;

    protected $guarded = [];

    public function setting()
    {
       return  $this->hasOne(GeneralSetting::class);
    }

    public function openingDuration()
    {
       return  $this->hasOne(OpeningDuration::class);
    }

    public function openingDurations()
    {
       return  $this->hasMany(OpeningDuration::class);
    }

    public function appointments()
    {
       return  $this->hasMany(Appointment::class);
    }

}
