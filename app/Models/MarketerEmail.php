<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketerEmail extends Model
{
    protected $fillable = [
        'marketer_id',
        'email',
    ];
}
