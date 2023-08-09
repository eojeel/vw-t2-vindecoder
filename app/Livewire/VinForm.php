<?php

namespace App\Livewire;

use App\Models\InteriorCode;
use App\Models\Mcode;
use App\Models\PaintCodes;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use stdClass;

class VinForm extends Component
{
    public $title = 'VW T2 Vin Decoder';

    public $mmmmm;

    public $mmmm;

    public $cc;

    public $pp;

    public $dd;

    public $uu;

    public $ee;

    public $tt;

    public $results;

    public function hydrate()
    {
        $this->results = new StdClass();

        $resArray = ['mcodes', 'paint_codes', 'interiorCodes'];
        foreach ($resArray as $res) {
            $this->results->$res = new Collection();
        }
    }

    public function save()
    {
        $validated = $this->validate([
             'cc' => 'required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
             'mmmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'pp' => 'required|size:6',
            'mmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
             'dd' => 'required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/',
             'uu' => 'required|size:4|regex:/^[a-zA-Z0-9]{4}$/',
             'ee' => 'required|size:2|regex:/^[a-zA-Z0-9]{2}$/',
             'tt' => 'required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/',
        ]);

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
