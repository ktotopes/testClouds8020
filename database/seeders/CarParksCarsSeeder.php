<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarPark;
use App\Models\CarParksCars;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarParksCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = Car::all();
        $parks = CarPark::all();

        foreach ($cars as $car) {
            $car->carParks()->attach(
              $parks->random(rand(1,3))->pluck('id')->toArray()
            );
        }
    }
}
