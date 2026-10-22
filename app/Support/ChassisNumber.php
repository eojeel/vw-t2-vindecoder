<?php

namespace App\Support;

final class ChassisNumber
{
    private const int FIRST_MODEL_YEAR = 1970;

    /**
     * The first digit of a T2 chassis number is the last digit of its model year (1970-1979).
     */
    public static function year(string $chassisNumber): ?string
    {
        $digit = substr($chassisNumber, 0, 1);

        return ctype_digit($digit) ? (string) (self::FIRST_MODEL_YEAR + (int) $digit) : null;
    }
}
