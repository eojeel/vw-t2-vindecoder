<?php

namespace App\Models;

use App\Enums\Transmission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelEngineGearbox extends Model
{
    use HasFactory;

    private const array MODEL_DESCRIPTIONS = [
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

    /**
     * The model, engine and transmission details for a body / engine / model code, or an empty array when unknown.
     *
     * @return array<string, mixed>
     */
    public static function detailsFor(string $code): array
    {
        $modelId = Str::substr($code, 0, 3);

        $details = static::select('model_description', 'engine_spec', 'transmission_type', 'engine_code', 'gearbox_code', 'extras')
            ->where('model_id', $modelId)
            ->where('sale_code', Str::substr($code, 2, 1))
            ->first();

        if (! $details) {
            return [];
        }

        $details->model_description = self::MODEL_DESCRIPTIONS[$modelId]                           ?? $details->model_description;
        $details->transmission_type = Transmission::tryFrom($details->transmission_type)?->label() ?? $details->transmission_type;

        return $details->toArray();
    }
}
