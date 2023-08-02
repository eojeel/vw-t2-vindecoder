<?php

namespace App\Livewire;

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
        $this->results->mcodes = new Collection();
        $this->results->paint_codes = new Collection();
    }

    public function save()
    {
        $validated = $this->validate([
            // 'cc' => 'required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            // 'mmmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'pp' => 'required|size:6',
            'mmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            // 'dd' => 'required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/',
            // 'uu' => 'required|size:4|regex:/^[a-zA-Z0-9]{4}$/',
            // 'ee' => 'required|size:2|regex:/^[a-zA-Z0-9]{2}$/',
            // 'tt' => 'required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/',
        ]);

        $this->results->mcodes = $this->mCode($this->mmmm);
        $this->results->paint_codes = $this->paintCode($this->pp);
    }

    public function render()
    {
        return view('livewire.vin-form');
    }

    public function mCode(string $mcodes): Collection
    {
        return Mcode::getByCodes($mcodes);
    }

    public function paintCode(string $paintCode): Collection
    {
        return PaintCodes::getByCode($paintCode);

    }
}
