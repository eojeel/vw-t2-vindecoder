<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaintCodes extends Model
{
    use HasFactory;

    /**
     * The paint details for a paint / interior code, where the paint is the first four characters.
     */
    public static function forCode(string $code): Collection
    {
        return static::where('plate_code', mb_substr($code, 0, 4))->get();
    }

    public function color(): HasMany
    {
        return $this->hasMany(Colors::class, 'code', 'color_code');
    }
}
