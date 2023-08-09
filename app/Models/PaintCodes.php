<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintCodes extends Model
{
    use HasFactory;

    public static function PaintDetails($code): Collection
    {
        return static::where('plate_code', mb_substr($code, 0, 4))->get();
    }
}
