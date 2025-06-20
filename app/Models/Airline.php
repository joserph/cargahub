<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airline extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'web',
        'phone',
        'email',
        'ruc',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'user_id',
        'user_update',
        'legal_name',
        'legal_address',
        'contact_email',
        'contact_phone',
        'logo'
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
}
