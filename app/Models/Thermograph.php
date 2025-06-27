<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thermograph extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'maritime_id',
        'code',
        'place',
        'brand'
    ];

    
}
