<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $guarded = [];

    const PAYMENTSTATUS = [
        'completed' => 1,
        'cancelled' => 3,
        'failed' => 2,
        'awaiting' => 4
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function totalPayment()
    {
        return $this->where('payment_status',self::PAYMENTSTATUS['completed'])->sum('amount_paid');
    }
}
