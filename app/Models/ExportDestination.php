<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExportDestination extends Model
{
    use HasFactory;

    public static function ExportDetails($code): string
    {
        $export = static::where('code', $code)
            ->first();

        if($export)
        {
            return $export->code.' - '.Str::replace('_', ' ', $export->destination);
        }

        return '';
    }
}
