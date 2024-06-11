<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductionDate extends Model
{
    use HasFactory;

    public static function Details($productionDate, $chassisNumber)
    {
        $productionDate = Str::of($productionDate)->explode(' ');

        $date = Carbon::now()->setISODate($chassisNumber, $productionDate[0]);

        if ($productionDate[0] <= 43) {
            $date->subYear(1);
        }

        $date->addDays((int) $productionDate[1]);

        return $date->format('l jS \\of F Y');
    }
}
