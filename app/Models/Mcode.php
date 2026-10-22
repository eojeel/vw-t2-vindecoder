<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcode extends Model
{
    use HasFactory;

    public static function CodeDetails($codes): Collection
    {
        // the code column is an integer, which Postgres will not compare against non-numeric strings
        $codes = array_filter(explode(' ', $codes), 'ctype_digit');

        return static::whereIn('code', $codes)->get();
    }
}
