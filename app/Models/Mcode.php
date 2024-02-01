<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Elequent\Collection;

class Mcode extends Model
{
    use HasFactory;

    public static function CodeDetails($codes): Collection
    {
        return static::whereIn('code', explode(' ', $codes))->get();
    }
}
