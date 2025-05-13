<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variety extends Model
{
    protected $fillable = [
        'name', 'scientific_name', 'user_id', 'user_update'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userupdate(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_update');
    }

    public function farms()
{
    return $this->belongsToMany(Farm::class);
}
}
