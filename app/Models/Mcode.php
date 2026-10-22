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
        return static::whereIn('code', explode(' ', $codes))->get();
    }
}
