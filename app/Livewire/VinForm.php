<?php

namespace App\Livewire;

use App\Models\InteriorCode;
use App\Models\Mcode;
use App\Models\PaintCodes;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;
use stdClass;

class VinForm extends Component
{
    public $title = 'VW T2 Vin Decoder';

    #[Rule('required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/')]
    public $mmmmm;

    #[Rule('required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/')]
    public $mmmm;

    #[Rule('required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/')]
    public $cc;

    #[Rule('required|size:6')]
    public $pp;

    #[Rule('required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/')]
    public $dd;

    #[Rule('required|size:4|regex:/^[a-zA-Z0-9]{4}$/')]
    public $uu;

    #[Rule('required|size:2|regex:/^[a-zA-Z0-9]{2}$/')]
    public $ee;

    #[Rule('required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/')]
    public $tt;

    public $results;

    public function hydrate()
    {
        $this->results = new StdClass();

        $resArray = ['mCodes', 'paintCodes', 'interiorCodes'];
        foreach ($resArray as $res) {
            $this->results->$res = new Collection();
        }
    }

    public function save()
    {
        $this->results->mCodes = $this->mCode($this->mmmm);
        $this->results->paintCodes = $this->paintCode($this->pp);
        $this->results->interiorCodes = $this->interior($this->pp);
    }

    public function render()
    {
        return view('livewire.vin-form');
    }

    private function mCode(string $mcodes): Collection
    {
        return Mcode::CodeDetails($mcodes);
    }

    private function paintCode(string $paintCode): Collection
    {
        return PaintCodes::PaintDetails($paintCode);
    }

    private function interior(string $interiorCode): Collection
    {
        return InteriorCode::InteriorDetails($interiorCode);
    }
}
