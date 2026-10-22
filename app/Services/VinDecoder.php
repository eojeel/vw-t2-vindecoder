<?php

namespace App\Services;

use App\Models\ExportDestination;
use App\Models\InteriorCode;
use App\Models\Mcode;
use App\Models\ModelEngineGearbox;
use App\Models\PaintCodes;
use App\Support\ChassisNumber;
use App\Support\ProductionDate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

final class VinDecoder
{
    /**
     * Decodes the plate details of a VIN into readable results.
     *
     * A plain object is returned because it is stored on a Livewire component.
     *
     * @param  array<string, mixed>  $vin
     */
    public function decode(array $vin): stdClass
    {
        $results = new stdClass;

        $results->chassisNumber = ChassisNumber::year($vin['chassis_number']);
        $results->production    = ProductionDate::format($vin['model_year'], $results->chassisNumber);
        $results->mCode1        = Mcode::forCodes($vin['mcode_1']);
        $results->mCode2        = Mcode::forCodes($vin['mcode_2']);

        $results->paintCodes   = PaintCodes::forCode($vin['paint_interior']);
        $results->colorDisplay = $results->paintCodes->first()?->color()->get() ?? new Collection;

        $results->interiorCodes = InteriorCode::forCode($vin['paint_interior']);
        $results->destination   = ExportDestination::label($vin['export_destination']);
        $results->engineTrans   = ModelEngineGearbox::detailsFor($vin['body_engine_model']);

        return $results;
    }
}
