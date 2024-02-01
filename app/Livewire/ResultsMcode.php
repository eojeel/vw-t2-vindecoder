<?php

namespace App\Livewire;

use Livewire\Component;

class ResultsMcode extends Component
{
    public $title;

    public $array;

    public function mount($array = [], $title = null)
    {
        $this->array = $array;
        $this->title = $title;
    }
}
