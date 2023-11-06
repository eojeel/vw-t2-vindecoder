<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelEngineGearbox extends Model
{
    use HasFactory;

    private static function details($tt)
    {
        return self::where('model_id', $mmmm)
            ->where('sale_code', $tt)
            ->first();
    }
}
