<?php

namespace App\Livewire;

use Livewire\Component;

class VinForm extends Component
{
    public $title = 'VW T2 Vin Decoder';

    #[Rule('required')]
    public $mmm = '';

    public function save()
    {
        dd($this->mmm);
    }

    public function render()
    {
        return view('livewire.vin-form');
    }
}
