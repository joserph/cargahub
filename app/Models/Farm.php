<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'user_update',
        'tradename',
        'ruc',
        'web',
        'user_id',
        'status',
        'vatieties'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(FarmPhone::class);
    }

    /*public function emails(): HasMany
    {
        return $this->hasMany(FarmEmail::class);
    }*/


    protected $casts = [
        'vatieties' => 'array',
    ];
}
