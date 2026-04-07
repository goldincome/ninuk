<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentReminder extends Model
{
    protected $fillable = ['appointment_id','days_before', 'sent_at'];
}
