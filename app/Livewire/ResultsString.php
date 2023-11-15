<?php

namespace App\Livewire;

use Livewire\Component;

class ResultsString extends Component
{
    public $title;

    public $string;

    public function mount($string = null, $title = null)
    {
        $this->string = $string;
        $this->title = $title;
    }
}
