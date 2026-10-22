<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteriorCode extends Model
{
    use HasFactory;

    /**
     * The interior details for a paint / interior code, where the interior is everything after the paint.
     */
    public static function forCode(string $code): Collection
    {
        return static::where('code', mb_substr($code, 4, 6))->get();
    }
}
