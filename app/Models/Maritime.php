<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maritime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'shipment',
        'bl',
        'booking',
        'carrier',
        'logistic_id',
        'driver_id',
        'date',
        'arrival_date',
        'plate',
        'container_number',
        'seal_bottle',
        'seal_cable',
        'seal_sticker',
        'floor',
        'num_pallets',
        'user_id',
        'user_update'
    ];

    public function logistic(): BelongsTo
    {
        return $this->belongsTo(Logistic::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
