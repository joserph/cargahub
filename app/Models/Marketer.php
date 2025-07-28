<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marketer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'user_update',
        'tradename',
        'user_id',
        'status',
    ];

    public function phones(): HasMany
    {
        return $this->hasMany(MarketerPhone::class);
    }

    public function emails(): HasMany
    {
        return $this->hasMany(MarketerEmail::class);
    }

    public function staffs(): HasMany
    {
        return $this->hasMany(MarketerStaff::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

}
