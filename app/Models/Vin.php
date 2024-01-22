<?php

namespace App\Models;

use stdClass;
use App\Models\Mcode;
use App\Models\PaintCodes;
use App\Models\ChassisNumber;
use App\Models\ProductionDate;
use App\Models\ModelEngineGearbox;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vin extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Decodes the VIN and sets the corresponding properties.
     *
     * @param  array  $validated  The validated VIN data.
     * @return void
     */
    public function decodeVin($validated)
    {
        $results = new stdClass();

        $results->chassisNumber = self::chassisNumber($validated['cc']);
        $results->production = self::production($validated['dd'], $results->chassisNumber);
        $results->mCode = self::mCode($validated['mmmm']);
        $results-> self::paintCode($validated['pp']);
        $results-> self::interior($validated['pp']);
        $results-> self::export($validated['ee']);
        $results-> self::engineTrans($validated['tt']);
        return $results;
    }

    /**
     * Sets the chassis number for the VinForm.
     *
     * @param  string  $chassisNumber  The chassis number to set.
     */
    private static function chassisNumber(string $chassisNumber): string
    {
        return ChassisNumber::Details($chassisNumber);
    }

    /**
     * sets the production date for the VinForm.
     *
     * @param  string  $productionDate  the production date input
     */
    private static function production(string $productionDate, $chassisNumber)
    {
        return ProductionDate::Details($productionDate, $chassisNumber);
    }

    /**
     * retrieves all the option codes for the vin, known as mcodes.
     *
     * @param  string  $mcodes  string of option codes.
     */
    private static function mCode(string $mcodes): Collection
    {
        return Mcode::CodeDetails($mcodes);
    }

    /**
     * sets the colour code of the form and bus display colour.
     *
     * @param  string  $paintCode  the paint code
     */
    private static function paintCode(string $paintCode): void
    {
        $this->results->paintCodes = PaintCodes::PaintDetails($paintCode);
        $this->setFirstPaintCodeColorDisplay();
    }

    /**
     * find the colour code of the paint and dispatch event.
     */
    private static function setFirstPaintCodeColorDisplay(): void
    {
        $firstPaintCode = $this->results->paintCodes->first();
        if ($firstPaintCode) {
            $this->results->colorDisplay = $firstPaintCode->color()->get();
            $this->dispatch('BusColour', $this->results->colorDisplay->first()->hex_code ?? Colors::random()->hex_code);
        }
    }

    /**
     * interiour details for the vin including apulstry and trim.
     *
     * @param  string  $interiorCode  the interior code
     */
    private static function interior(string $interiorCode): void
    {
        $this->results->interiorCodes = InteriorCode::InteriorDetails($interiorCode);
    }

    /**
     * export destination of the vin.
     *
     * @param  string  $exportCode  the export code
     */
    private static function export(string $exportCode): void
    {
        $this->results->destination = ExportDestination::ExportDetails($exportCode);
    }

    /**
     * engine and transmission details for the vin.
     *
     * @param  string  $engineTrans  the engine and transmission code
     */
    private static function engineTrans(string $engineTrans): void
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
    private static function appendEngineSpec()
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
    private static function engineModel(string $engine): string
    {
        return EngineCode::Details($engine);
    }
}
