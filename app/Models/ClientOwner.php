<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientOwner extends Model
{
    protected $fillable = [
        'client_id',
        'owner',
        'phone',
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
