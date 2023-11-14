<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EngineCode extends Model
{
    use HasFactory;

    public static function Details($engine): string
    {
        $engine = Str::substr($engine, 5, 1);

        $engineDetails = static::where('engine_code', $engine)->first(['engine_type', 'fuel_induction']);

        return $engineDetails->engine_type.' '.$engineDetails->fuel_induction;
    }
}
