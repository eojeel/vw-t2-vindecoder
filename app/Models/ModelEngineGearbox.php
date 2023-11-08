<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class ModelEngineGearbox extends Model
{
    use HasFactory;

    private static $modelDescription = [
        '211' => 'Delivery van, sliding door right, LHD',
        '214' => 'Delivery van, sliding door left, RHD',
        '215' => 'Delivery van, sliding door left and right, LHD',
        '216' => 'Delivery van, sliding door left and right, RHD',
        '221' => 'Micro bus, 7/8/9 seater, sliding door right, LHD',
        '224' => 'Micro bus, 8/9 seater, sliding door left, RHD',
        '225' => 'Micro bus, 7/8/9 seater, sliding door right, LHD',
        '228' => 'Micro bus, 8/9 seater, sliding door left, RHD',
        '231' => 'Kombi, sliding door right, LHD',
        '234' => 'Kombi, sliding door left, RHD',
        '235' => 'Kombi, sliding door right, sunroof (?), LHD',
        '241' => 'Micro bus deluxe, 7/8/9 seater, LHD',
        '244' => 'Micro bus deluxe, 8/9 seater, RHD',
        '261' => 'Pick-up, Luggage compartment door right, LHD',
        '264' => 'Pick-up, Luggage compartment door left, RHD',
        '265' => 'Pick-up, Double cabin, passenger door right, LHD',
        '268' => 'Pick-up, Double cabin, passenger door left, RHD',
        '271' => 'Ambulance, cargo door right, LHD',
        '274' => 'Ambulance, cargo door left, RHD',
    ];

    public static function Details(string $tt): ?array
    {
        $model_id = Str::substr($tt, 0, 3);
        $sale_code = Str::substr($tt, 2, 1);

        $details = self::select('model_id', 'sale_code', 'model_description', 'engine_spec', 'transmission_type', 'engine_code', 'gearbox_code', 'extras')
            ->where('model_id', $model_id)
            ->where('sale_code', $sale_code)
            ->first();

        if (! empty($details)) {
            $details->model_description = self::model($model_id);

            return $details->toArray();
        }

        return null;

    }

    private static function model(int $model): string
    {
        return self::$modelDescription[$model];
    }

    public function engine(): HasOne
    {
        return $this->hasOne(EngineCode::class, 'engine_code');
    }

    public function gearbox(): HasOne
    {
        return $this->hasOne(GearboxCode::class, 'gearbox_code');
    }
}
