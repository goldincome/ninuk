<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClosedDuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date_from',
        'date_to',
        'location_id',
        'time_slices',
        'status'
    ];

    protected $casts = [
            'date_from' => 'date',
            'date_to' => 'date',
        ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

}
