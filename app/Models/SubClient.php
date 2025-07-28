<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubClient extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'name',
        'user_update',
        'type_load',
        'user_id',
        'status',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(SubClientPhone::class);
    }

    public function emails(): HasMany
    {
        return $this->hasMany(SubClientEmail::class);
    }

    // public function marketers(): BelongsToMany
    // {
    //     return $this->belongsToMany(Marketer::class);
    // }

    public function marketers(): BelongsToMany
{
    return $this->belongsToMany(Marketer::class, 'sub_client_marketer');
}
}
