<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChassisNumber extends Model
{
    use HasFactory;

    private static $years = [
        0 => '1970',
        1 => '1971',
        2 => '1972',
        3 => '1973',
        4 => '1974',
        5 => '1975',
        6 => '1976',
        7 => '1977',
        8 => '1978',
        9 => '1979'
    ];

    public static function Details($chassisNumber): string|null
    {

        return self::$years[$chassisNumber[0]] ?? null;

    }
}
