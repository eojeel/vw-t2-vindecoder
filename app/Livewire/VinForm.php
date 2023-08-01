<?php

namespace App\Livewire;

use App\Models\Mcode;
use App\Models\PaintCodes;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

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

    public function save()
    {
        $validated = $this->validate([
            // 'cc' => 'required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            // 'mmmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'pp' => 'required|size:6',
            //'mmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            // 'dd' => 'required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/',
            // 'uu' => 'required|size:4|regex:/^[a-zA-Z0-9]{4}$/',
            // 'ee' => 'required|size:2|regex:/^[a-zA-Z0-9]{2}$/',
            // 'tt' => 'required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/',
        ]);

        //$this->results['mcodes'] = $this->mCode($this->mmmmm);
        $this->results['paint code'] = $this->paintCode($this->pp);
    }

    public function render()
    {
        return view('livewire.vin-form');
    }

    public function mCode(string $mcodes): Collection
    {
        return Mcode::getByCodes($mcodes);
    }

    public function paintCode(string $paintCode): array
    {
        $codes = PaintCodes::getByCode($paintCode);

        return compact('codes');
    }
}
