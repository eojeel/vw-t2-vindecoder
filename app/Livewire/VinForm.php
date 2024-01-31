<?php

namespace App\Livewire;

use App\Livewire\Forms\VinSubmitForm;
use App\Models\Colors;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Vintage VW Decoder - VW T2 (1970-1979) Vin Decoder')]
class VinForm extends Component
{
    public VinSubmitForm $form;

    public $colors = [];

    public $vindetails;

    public function render()
    {
        return view('livewire.vin-form');
    }

    public function mount()
    {
        $this->colors = Colors::all(['code', 'name', 'hex_code']);
    }


    public function save()
    {
        $this->form->save();

        $this->dispatch('BusColour', $this->form->results->colorDisplay->first()->hex_code ?? Colors::random()->hex_code);

    }
}
