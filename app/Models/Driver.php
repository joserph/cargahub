<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'last_name',
        'id_number',
        'phone',
        'user_id',
        'user_update',
    ];
}
