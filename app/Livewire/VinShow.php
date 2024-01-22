<?php

namespace App\Livewire;

use App\Livewire\Forms\VinSubmitForm;
use App\Models\Colors;
use App\Models\Vin;
use Illuminate\Support\Str;
use Livewire\Component;

class VinShow extends Component
{
    public VinSubmitForm $form;

    public $colors = [];

    public $results;

    public function render()
    {
        return view('livewire.vin-form');
    }

    public function mount($chassisNumber = null)
    {
        $this->colors = Colors::all(['code', 'name', 'hex_code']);

        $chassisNumber = Str::substr($chassisNumber, 0, 2).' '.Str::substr($chassisNumber, 2, 3).' '.Str::substr($chassisNumber, 5, 3);

        $vin = Vin::where('cc', $chassisNumber)->firstOrFail();

        foreach ($vin->getAttributes() as $key => $value) {
            if ($value) {
                $this->form->$key = $value;
                $this->$key = $value;
            }
        }

        $this->results = Vin::decodeVin($vin->getAttributes());

        $this->dispatch('BusColour', $this->results->colorDisplay->first()->hex_code ?? Colors::random()->hex_code);
    }
}
