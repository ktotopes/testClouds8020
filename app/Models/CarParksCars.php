<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CarParksCars extends Pivot
{
    protected $guarded = [];
    protected $table = 'car_parks_cars';
}
