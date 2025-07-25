<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'zip_code',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'user_update',
        'marketers',
        'type_load',
        'poa',
        'user_id',
        'status',
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
        return $this->hasMany(ClientPhone::class);
    }

    public function emails(): HasMany
    {
        return $this->hasMany(ClientEmail::class);
    }

    public function marketers(): BelongsToMany
    {
        return $this->belongsToMany(Marketer::class);
    }

    public function owners(): HasMany
    {
        return $this->hasMany(ClientOwner::class);
    }

    public function subClients()
    {
        return $this->hasMany(SubClient::class);
    }

}
