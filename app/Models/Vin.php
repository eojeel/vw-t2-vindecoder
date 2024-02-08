<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use stdClass;

class Vin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $results;

    /**
     * Decodes the VIN and sets the corresponding properties.
     *
     * @param  array  $validated  The validated VIN data.
     * @return void
     */
    public static function decodeVin(array $validated): stdClass
    {
        self::$results = new stdClass();

        self::$results->chassisNumber = self::chassisNumber($validated['chassis_number']);
        self::$results->production = self::production($validated['model_year'], self::$results->chassisNumber);
        self::$results->mCode1 = self::mCode($validated['mcode_1']);
        self::$results->mCode2 = self::mCode($validated['mcode_2']);
        self::$results->paintCodes = self::paintCode($validated['paint_interior']);
        self::$results->interiorCodes = self::interior($validated['paint_interior']);
        self::$results->destination = self::export($validated['export_destination']);
        self::$results->engineTrans = self::engineTrans($validated['body_engine_model']);

        return self::$results;
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
    private static function paintCode(string $paintCode): Collection
    {
        $paintCode = PaintCodes::PaintDetails($paintCode);

        self::setFirstPaintCodeColorDisplay($paintCode);

        return $paintCode;
    }

    /**
     * find the colour code of the paint and dispatch event.
     */
    private static function setFirstPaintCodeColorDisplay(Collection $paintCode): void
    {
        $firstPaintCode = $paintCode->first();
        if ($firstPaintCode) {
            self::$results->colorDisplay = $firstPaintCode->color()->get();
        } else {
            self::$results->colorDisplay = new Collection([]);
        }
    }

    /**
     * interiour details for the vin including apulstry and trim.
     *
     * @param  string  $interiorCode  the interior code
     */
    private static function interior(string $interiorCode): Collection
    {
        return InteriorCode::InteriorDetails($interiorCode);
    }

    /**
     * export destination of the vin.
     *
     * @param  string  $exportCode  the export code
     */
    private static function export(string $exportCode): string
    {
        return ExportDestination::ExportDetails($exportCode);
    }

    /**
     * engine and transmission details for the vin.
     *
     * @param  string  $engineTrans  the engine and transmission code
     */
    private static function engineTrans(string $engineTrans): array
    {
        $car = new ModelEngineGearbox();

        $engineTrans = $car->getModelDetailsByCode($engineTrans);
        self::appendEngineSpec();

        return $engineTrans;
    }

    /**
     * additional formatting of engine specs to improve readability.
     *
     * @return void
     */
    private static function appendEngineSpec()
    {
        if (! empty(self::$results->engineTrans)) {
            self::$results->engineTrans['engine_spec'] .= ' - '.self::engineModel(self::$results->engineTrans['code'] ?? '');
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
