<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubClientPhone extends Model
{
    protected $fillable = [
        'sub_client_id',
        'phone',
    ];
}
