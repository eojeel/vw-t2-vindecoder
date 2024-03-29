<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaintCodes extends Model
{
    use HasFactory;

    public static function PaintDetails($code): Collection
    {
        $code = mb_substr($code, 0, 4);

        return PaintCodes::where('plate_code', $code)
            ->get();
    }

    public function color(): HasMany
    {

        return $this->hasMany(Colors::class, 'code', 'color_code');
    }
}
