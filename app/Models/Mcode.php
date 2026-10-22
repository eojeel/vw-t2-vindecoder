<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcode extends Model
{
    use HasFactory;

    /**
     * The option codes for a space separated list of M-codes.
     */
    public static function forCodes(?string $codes): Collection
    {
        // the code column is an integer, so anything that isn't a number can't match
        $codes = array_filter(explode(' ', (string) $codes), 'ctype_digit');

        return static::whereIn('code', $codes)->get();
    }
}
