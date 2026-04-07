<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = ['no_of_access_points_per_duration', 'duration_per_appointment', 
    'allow_appointment_booking', 'nin_capture_price'];
}
