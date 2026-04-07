<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    const UPCOMING = 1;
    const COMPLETED = 2;
    const PAYMENT_FAILED = 3;
    const CANCELLED = 4;
    const TOPAYONCAPTURE = 5;
    const CARD_TYPE_PRINT_OUT = 'Print Out';
    const CARD_TYPE_PVC = 'PVC';

    protected $casts = [
        'date' => 'datetime',
    ];

    // public function payment()
    // {
    //     $this->hasOne(Payment::class);
    // }

    
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    } 
    
    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function ourService(): BelongsTo
    {
        return $this->belongsTo(OurService::class);
    }

    public function reminders()
    {
        return $this->hasMany(AppointmentReminder::class);
    }
    
}
