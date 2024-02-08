<?php

namespace App\Livewire;

use App\Livewire\Forms\VinSubmitForm;
use App\Models\Colors;
use App\Models\Vin;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('View Decoded Vin - VW T2 (1970-1979) Vin Decoder')]
class VinShow extends Component
{
    public VinSubmitForm $form;

    public $colors = [];

    public $busColor = '';

    public $results;

    public function render()
    {
        return view('livewire.vin-form');
    }

    public function mount($chassisNumber = null)
    {
        $this->colors = Colors::all(['code', 'name', 'hex_code']);

        $chassisNumber = Str::substr($chassisNumber, 0, 2).' '.Str::substr($chassisNumber, 2, 3).' '.Str::substr($chassisNumber, 5, 3);

        $vin = Vin::where('chassis_number', $chassisNumber)->firstOrFail();

        foreach ($vin->getAttributes() as $key => $value) {
            if ($value) {
                $this->form->$key = $value;
                $this->$key = $value;
            }
        }

        $this->results = Vin::decodeVin($vin->getAttributes());

    }

    public function rendered()
    {
        if ($this->results->colorDisplay->first()) {
            $this->busColor = $this->results->colorDisplay->first()->hex_code;
        }
    }

    public function save()
    {
        $this->form->save();
    }
}
