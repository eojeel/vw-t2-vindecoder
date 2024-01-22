<?php

namespace App\Livewire;

use App\Livewire\Forms\VinSubmitForm;
use App\Models\Colors;
use App\Models\Vin;
use Livewire\Component;

class VinForm extends Component
{
    public $title = 'VW T2 Vin Decoder';

    public VinSubmitForm $form;

    public $results;

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
        $this->validate();

        $this->results = Vin::decodeVin($this->form->all());

        Vin::updateOrCreate(
            ['cc' => $this->form->cc],
            $this->form->all()
        );

    }


}
