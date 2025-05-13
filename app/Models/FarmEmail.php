<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmEmail extends Model
{
    protected $fillable = [
        'farm_id',
        'email',
    ];
}
