<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningDuration extends Model
{
    use HasFactory;

    protected $table = 'opening_days_duration';

    protected $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
        'total_mins',
        'status'
    ];
}
