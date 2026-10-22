<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EngineCode extends Model
{
    use HasFactory;

    /**
     * A readable engine type and fuel induction for an engine code, or an empty string when it is unknown.
     */
    public static function label(string $engine): string
    {
        $details = static::where('engine_code', Str::substr($engine, 5, 1))->first(['engine_type', 'fuel_induction']);

        return $details ? $details->engine_type.' '.$details->fuel_induction : '';
    }
}
