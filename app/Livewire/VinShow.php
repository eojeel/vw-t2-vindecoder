<?php

namespace App\Livewire;

use App\Models\Vin;
use App\Models\Colors;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class VinShow extends Component
{
    public $colors = [];
    public $results; // Declare the $results property

    public function render()
    {
        return view('livewire.vin-form');
    }

    public function mount($chassisNumber = null)
    {
        $this->colors = Colors::all(['code', 'name', 'hex_code']);

        $chassisNumber = Str::substr($chassisNumber, 0, 2).' '.Str::substr($chassisNumber, 2, 3).' '.Str::substr($chassisNumber, 5, 3);

        $vin = Vin::where('cc', $chassisNumber)->firstOrFail();

        dd($vin);

        foreach ($vin->getAttributes() as $key => $value) {
            if ($value) {
                $this->form->$key = $value;
                $this->$key = $value;
            }
        }
    }

    public function hydrate()
    {
        $resArray = ['mCode', 'paintCodes', 'interiorCodes'];
        foreach ($resArray as $res) {
            $this->results->$res = new Collection();
        }
    }
}
