<?php

namespace App\Livewire;

use App\Livewire\Forms\VinSubmitForm;
use App\Models\ChassisNumber;
use App\Models\EngineCode;
use App\Models\ExportDestination;
use App\Models\InteriorCode;
use App\Models\Mcode;
use App\Models\ModelEngineGearbox;
use App\Models\PaintCodes;
use App\Models\ProductionDate;
use App\Models\Vin;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class VinForm extends Component
{
    public $title = 'VW T2 Vin Decoder';

    public VinSubmitForm $form;

    public $results;

    public function render()
    {
        return view('livewire.vin-form');
    }

    public function mount($vindetails = null)
    {
        if (empty($vindetails)) {
            return;
        }

        $this->hydrate();
        $this->decodeVin($vindetails);

        foreach ($vindetails->getAttributes() as $key => $value) {
            if ($value) {
                $this->form->$key = $value;
            }
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
        $this->validate();

        $this->decodeVin($this->form->all());

        if (! Vin::where('cc', $this->form->cc)->exists()) {
            Vin::create($this->form->all());
        }
    }

    /**
     * Decodes the VIN and sets the corresponding properties.
     *
     * @param  array  $validated  The validated VIN data.
     * @return void
     */
    private function decodeVin($validated)
    {
        $this->chassisNumber($validated['cc']);
        $this->production($validated['dd']);
        $this->mCode($validated['mmmm']);
        $this->paintCode($validated['pp']);
        $this->interior($validated['pp']);
        $this->export($validated['ee']);
        $this->engineTrans($validated['tt']);
    }

    /**
     * Sets the chassis number for the VinForm.
     *
     * @param  string  $chassisNumber  The chassis number to set.
     */
    private function chassisNumber(string $chassisNumber): void
    {
        $this->results->chassisNumber = ChassisNumber::Details($chassisNumber);
    }

    /**
     * sets the production date for the VinForm.
     *
     * @param  string  $productionDate  the production date input
     */
    private function production(string $productionDate): void
    {
        $this->results->production = ProductionDate::Details($productionDate, $this->results->chassisNumber);
    }

    /**
     * retrieves all the option codes for the vin, known as mcodes.
     *
     * @param  string  $mcodes  string of option codes.
     */
    private function mCode(string $mcodes): void
    {
        $this->results->mCode = Mcode::CodeDetails($mcodes);
    }

    /**
     * sets the colour code of the form and bus display colour.
     *
     * @param  string  $paintCode  the paint code
     */
    private function paintCode(string $paintCode): void
    {
        $this->results->paintCodes = PaintCodes::PaintDetails($paintCode);
        $this->setFirstPaintCodeColorDisplay();
    }

    /**
     * find the colour code of the paint
     */
    private function setFirstPaintCodeColorDisplay(): void
    {
        $firstPaintCode = $this->results->paintCodes->first();
        if ($firstPaintCode) {
            $this->results->colorDisplay = $firstPaintCode->color()->get();
        }
    }

    /**
     * interiour details for the vin including apulstry and trim.
     *
     * @param  string  $interiorCode  the interior code
     */
    private function interior(string $interiorCode): void
    {
        $this->results->interiorCodes = InteriorCode::InteriorDetails($interiorCode);
    }

    /**
     * export destination of the vin.
     *
     * @param  string  $exportCode  the export code
     */
    private function export(string $exportCode): void
    {
        $this->results->destination = ExportDestination::ExportDetails($exportCode);
    }

    /**
     * engine and transmission details for the vin.
     *
     * @param  string  $engineTrans  the engine and transmission code
     */
    private function engineTrans(string $engineTrans): void
    {
        $car = new ModelEngineGearbox();

        $this->results->engineTrans = $car->getModelDetailsByCode($engineTrans);
        $this->appendEngineSpec();
    }

    /**
     * additional formatting of engine specs to improve readability.
     *
     * @return void
     */
    private function appendEngineSpec()
    {
        if (! empty($this->results->engineTrans)) {
            $this->results->engineTrans['engine_spec'] .= ' - '.$this->engineModel($this->results->engineTrans['code'] ?? '');
        }
    }

    /**
     * engine model details for the vin.
     *
     * @param  string  $engine  the engine code
     */
    private function engineModel(string $engine): string
    {
        return EngineCode::Details($engine);
    }
}
