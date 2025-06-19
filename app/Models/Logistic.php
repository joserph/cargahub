<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\ValidationException;

class Logistic extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'web',
        'ruc',
        'status',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'user_id',
        'user_update',
        'logo'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($logistic) {
            if ($logistic->dehydrateStateUsing) {
                $query = Logistic::where('status', true);

                if ($logistic->exists) {
                    $query->where('id', '!=', $logistic->id);
                }

                if ($query->exists()) {
                    throw ValidationException::withMessages([
                        'status' => 'Ya existe una empresa activa. Debes desactivarla antes de activar otra.',
                    ]);
                }
            }
        });
    }

    public function phones(): HasMany
    {
        return $this->hasMany(LogisticPhone::class);
    }

    public function emails(): HasMany
    {
        return $this->hasMany(LogisticEmail::class);
    }

}
