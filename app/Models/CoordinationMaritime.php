<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CoordinationMaritime extends Model
{
    protected $fillable = [
        'hawb',
        'fb',
        'hb',
        'qb',
        'eb',
        'db',
        'fulls',
        'pieces',
        'fb_r',
        'hb_r',
        'qb_r',
        'eb_r',
        'db_r',
        'fulls_r',
        'pieces_r',
        'returns',
        'client_id',
        'farm_id',
        'maritime_id',
        'varieties',
        'user_id',
        'user_update',
        'marketer_id',
        'observation'
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected $casts = [
        'varieties' => 'array',
    ];

}
