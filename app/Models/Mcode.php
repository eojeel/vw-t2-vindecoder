<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcode extends Model
{
    use HasFactory;

    public static function getByCodes($codes)
    {
        return static::whereIn('code', explode(' ', $codes))->get();
    }
}
