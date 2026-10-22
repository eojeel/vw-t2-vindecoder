<?php

namespace App\Livewire;

use App\Livewire\Forms\VinSubmitForm;
use App\Models\Colors;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;
use stdClass;

#[Title('Vintage VW Decoder - VW T2 (1970-1979) Vin Decoder')]
class VinForm extends Component
{
    public VinSubmitForm $form;

    #[Locked]
    public Collection|array $colors = [];

    public string $busColor = '';

    public string $busColorSelector = '';

    public $vindetails;

    public ?stdClass $results = null;

    public function mount(): void
    {
        $this->colors = Colors::all(['code', 'name', 'hex_code']);
    }

    public function save(): void
    {
        $this->results = $this->form->save();

        $this->dispatch('buscolour', $this->results->colorDisplay->first()?->hex_code ?? Colors::random()?->hex_code);
    }

    public function render()
    {
        return view('livewire.vin-form');
    }
}
