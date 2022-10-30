<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarPark;

class ParkView extends Component
{
    public ?CarPark $park = null;

    public $form = [];

    protected array $rules = [
        'form.name'     => 'required|string',
        'form.address'  => 'required|string',
        'form.schedule' => 'required',
    ];

    public function savePark()
    {
        $this->validate();

        $this->park->name = $this->form['name'];
        $this->park->address = $this->form['address'];
        $this->park->schedule = $this->form['schedule'];

        $this->park->save();
//        $this->park->update($this->form);
    }

    public function mount()
    {
        $this->fillForm();
    }

    public function render()
    {
        return view('livewire.park-view');
    }

    private function fillForm()
    {
        $this->form = [
            'name'     => $this->park->name,
            'address'  => $this->park->address,
            'schedule' => $this->park->schedule,
        ];
    }
}
