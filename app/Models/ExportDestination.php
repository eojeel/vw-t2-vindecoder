<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportDestination extends Model
{
    use HasFactory;

    public static function ExportDetails($code): array
    {
        return static::where('code', $code)
            ->first()
            ->toArray();
    }
}
