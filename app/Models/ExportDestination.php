<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExportDestination extends Model
{
    use HasFactory;

    /**
     * A readable "CODE - Destination" label for an export code, or an empty string when it is unknown.
     */
    public static function label(string $code): string
    {
        $destination = static::where('code', $code)->first();

        return $destination
            ? $destination->code.' - '.Str::replace('_', ' ', $destination->export)
            : '';
    }
}
