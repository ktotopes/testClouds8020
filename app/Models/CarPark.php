<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarPark extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cars() : BelongsToMany
    {
        return $this->belongsToMany(Car::class,'car_parks_cars');
    }
}
