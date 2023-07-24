<?php

namespace App\Livewire;

use Livewire\Component;

class VinForm extends Component
{
    public $title = 'VW T2 Vin Decoder';

    public $mmmmm = '';
    public $mmmm = '';
    public $cc = '';
    public $pp = '';

    public function save()
    {
        $validated = $this->validate([
            'cc' => 'required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'mmmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'pp' => 'required|digits:6',
            'mmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
        ]);


        dd($validated);

    }

    public function render()
    {
        return view('livewire.vin-form');
    }
}
