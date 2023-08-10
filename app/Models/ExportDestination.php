<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExportDestination extends Model
{
    use HasFactory;

    public static function ExportDetails($code): Collection
    {
        return static::where('code', $code)->get();
    }
}
