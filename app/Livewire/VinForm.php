<?php

namespace App\Livewire;

use App\Models\ChassisNumber;
use App\Models\Colors;
use App\Models\EngineCode;
use App\Models\ExportDestination;
use App\Models\InteriorCode;
use App\Models\Mcode;
use App\Models\ModelEngineGearbox;
use App\Models\PaintCodes;
use App\Models\ProductionDate;
use App\Models\Vin;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class VinForm extends Component
{
    public $title = 'VW T2 Vin Decoder';

    #[Rule('nullable|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'M-Code')]
    public $mmmmm;

    #[Rule('required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'M-Code')]
    public $mmmm;

    #[Rule('required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'Chassis Number')]
    public $cc;

    #[Rule('required|size:6', as: 'Paint Code')]
    public $pp;

    #[Rule('required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/', as: '(DD D) Production Date')]
    public $dd;

    #[Rule('required|size:4|regex:/^[a-zA-Z0-9]{4}$/', as: '(UUUU) Production Plant')]
    public $uu;

    #[Rule('required|size:2|regex:/^[a-zA-Z0-9]{2}$/', as: '(EE) Export Destination')]
    public $ee;

    #[Rule('required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/', as: '(XXXX TT) Body Model (Engine & Gearbox) Type')]
    public $tt;

    public $results;

    public function mount($vindetails = null)
    {
        if (empty($vindetails)) {
            return;
        }

        $this->hydrate();
        $this->decodeVin($vindetails);

        $attributes = ['cc', 'mmmmm', 'mmmm', 'pp', 'dd', 'uu', 'ee', 'tt'];
        foreach ($attributes as $attribute) {
            $this->{$attribute} = $vindetails->{$attribute};
        }
    }

    public function hydrate()
    {
        $this->results = new Collection();

        $resArray = ['mCode', 'paintCodes', 'interiorCodes'];
        foreach ($resArray as $res) {
            $this->results->$res = new Collection();
        }
    }

    public function save()
    {
        $validated = $this->validate();

        $this->decodeVin($validated);

        if (! Vin::where('cc', $validated['cc'])->exists()) {
            Vin::create($validated);
        }
    }

    private function decodeVin($validated)
    {
        $this->results->chassisNumber = $this->chassisNumber($validated['cc']);
        $this->results->production = $this->production($validated['dd'], $this->results->chassisNumber);
        $this->results->mCode = $this->mCode($validated['mmmm']);
        $this->results->paintCodes = $this->paintCode($validated['pp']);

        $firstPaintCode = $this->results->paintCodes->first();
        if ($firstPaintCode) {
            $this->results->colorDisplay = $firstPaintCode->color()->get();
        }

        $this->results->interiorCodes = $this->interior($validated['pp']);
        $this->results->destination = $this->export($validated['ee']);

        $this->results->engineTrans = $this->engineTrans($validated['tt']);

        if (! empty($this->results->engineTrans)) {
            $this->results->engineTrans['engine_spec'] .= ' - '.$this->engineModel($validated['tt']);
        }

        if (! empty($this->results->colorDisplay)) {

            $this->dispatch('BusColour', $this->results->colorDisplay->first()->hex_code ?? Colors::random()->hex_code);
        }
    }

    public function render()
    {
        return view('livewire.vin-form');
    }

    private function chassisNumber(string $chassisNumber): string
    {
        return ChassisNumber::Details($chassisNumber);
    }

    private function production(string $productionDate, string $chassisNumber): string
    {
        return ProductionDate::Details($productionDate, $chassisNumber);
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

    private function export(string $exportCode): string
    {
        return ExportDestination::ExportDetails($exportCode);
    }

    private function engineTrans(string $engineTrans): array
    {
        $car = new ModelEngineGearbox();

        return $car->getModelDetailsByCode($engineTrans);
    }

    private function engineModel(string $engine): string
    {
        return EngineCode::Details($engine);
    }
}
