<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;
use App\Models\CarPark;
use App\Models\CarParksCars;
use Illuminate\Database\Eloquent\Collection;

class CarList extends Component
{

    public array|Collection $cars;
    public ?CarPark $park = null;
    public array $form = [];

    protected array $rules = [
        'form.*.name'   => 'required|string|max:255',
        'form.*.number' => 'required|string|min:2',
    ];


    public function addCar()
    {
        $car = new Car([
            'user_id' => auth()->id(),
        ]);

        $car->save();

        if ($this->park) {
            CarParksCars::updateOrCreate(
                [
                    'car_id'  => $car->id,
                    'car_park_id' => $this->park->id,
                ],
                [
                    'car_id'  => $car->id,
                    'car_park_id' => $this->park->id,
                ]
            );
        }
        $this->loadData();
        $this->fillForm();
    }

    public function deleteCar(Car $car)
    {
        $car->delete();
    }

    public function saveCars()
    {
        $this->validate();

        foreach ($this->form as $carItem) {
            $car = Car::find($carItem['id']);

            if (
                Car::query()
                    ->where('number', '=', $carItem['number'])
                    ->where('id', '!=', $carItem['id'])
                    ->exists()
            ) {
                $car->delete();
                $car = Car::query()->where('number', '=', $carItem['number'])->first();
            }

            $car->name = $carItem['name'];
            $car->number = $carItem['number'];

            $car->save();

            if ($this->park) {
                CarParksCars::updateOrCreate(
                    [
                        'car_id'  => $car->id,
                        'car_park_id' => $this->park->id,
                    ],
                    [
                        'car_id'  => $car->id,
                        'car_park_id' => $this->park->id,
                    ]
                );
            }

            $this->loadData();

            $this->fillForm();
        }
    }

    public function mount()
    {
        $this->loadData();

        $this->fillForm();
    }

    public function render()
    {
        $this->loadData();

        return view('livewire.car-list');
    }

    public function loadData()
    {
        $this->cars = Car::query()
            ->with(['user', 'carParks'])
            ->where(
                fn($query) => $this->park
                    ? $query->whereHas('carParks', fn($query) => $query->where('car_park_id', $this->park->id))
                    : $query
            )
            ->get();
    }

    private function fillForm()
    {
        foreach ($this->cars as $car) {

            $this->form[$car->id] = [
                'id'     => $car->id,
                'name'   => $car->name,
                'number' => $car->number,
            ];
        }
    }
}
