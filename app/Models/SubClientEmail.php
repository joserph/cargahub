<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubClientEmail extends Model
{
    protected $fillable = [
        'sub_client_id',
        'email',
    ];
}
