<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmPhone extends Model
{
    protected $fillable = [
        'farm_id',
        'phone',
    ];
}
