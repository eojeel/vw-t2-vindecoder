<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExportDestination extends Model
{
    use HasFactory;

    public static function ExportDetails($code): string
    {
        $export = static::where('code', $code)
            ->first();

        if ($export) {
            return $export->code.' - '.Str::replace('_', ' ', $export->export);
        }

        return '';
    }
}
