<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ModelEngineGearbox extends Model
{
    use HasFactory;

    public static function Details($tt): Collection
    {
        return self::select('model_id', 'sale_code', 'model_description', 'engine_spec', 'transmission_type', 'engine_code', 'gearbox_code', 'extras')
            ->where('model_id', Str::substr($tt, 0, 3))
            ->where('sale_code', Str::substr($tt, 2, 1))
            ->get();
    }

    public function engine(): HasOne
    {
        return $this->hasOne(EngineCode::class, 'engine_code');
    }

    public function geargbox(): HasOne
    {
        return $this->hasOne(GearboxCode::class, 'gearbox_code');
    }
}
