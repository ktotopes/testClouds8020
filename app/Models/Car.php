<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static function booted()
    {
        static::addGlobalScope('forUser', function (Builder $builder) {
            if (auth()->check() && !auth()->user()->role) {
                $builder->where('user_id', '=',auth()->id());
            }
        });
    }

    public function scopeForUser(Builder $builder)
    {
        $builder->where('user_id', '=',auth()->id());
    }

    public function carParks(): BelongsToMany
    {
        return $this->belongsToMany(CarPark::class, 'car_parks_cars');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
