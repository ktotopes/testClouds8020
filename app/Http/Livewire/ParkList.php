<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarPark;
use Illuminate\Database\Eloquent\Collection;

class ParkList extends Component
{
    public array|Collection $parks;

    public function deletePark(CarPark $carPark)
    {
        $carPark->delete();
    }

    public function render()
    {
        $this->parks = CarPark::query()->with('cars')->get();

        return view('livewire.park-list');
    }
}
