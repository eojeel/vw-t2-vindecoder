<?php

namespace App\Support;

use Illuminate\Support\Carbon;

final class ProductionDate
{
    /**
     * Weeks up to and including this one belong to the previous calendar year.
     */
    private const int LAST_WEEK_OF_PREVIOUS_YEAR = 43;

    /**
     * Turns a "week day" production code (e.g. "12 3") and the year from the chassis number into a readable date.
     */
    public static function format(string $productionCode, ?string $year): string
    {
        if ($year === null) {
            return '';
        }

        [$week, $day] = array_pad(explode(' ', $productionCode, 2), 2, 0);

        $date = Carbon::now()->setISODate((int) $year, (int) $week);

        if ((int) $week <= self::LAST_WEEK_OF_PREVIOUS_YEAR) {
            $date->subYear();
        }

        return $date->addDays((int) $day)->format('l jS \\of F Y');
    }
}
