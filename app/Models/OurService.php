<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OurService extends Model
{
    protected $fillable = [
        'service_type_id',
        'location_id',
        'price',
        'pvc_print_delivery_cost',
        'status',
        'allow_online_payment',
    ];

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    } 

}
