<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'variety_id',
        'user_id',
        'user_update',
        'marketer_id',
        'observation'
    ];

    public function maritime()
    {
        return $this->belongsTo(Maritime::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }

    public function marketer()
    {
        return $this->belongsTo(Marketer::class);
    }

}
