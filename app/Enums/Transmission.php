<?php

namespace App\Enums;

enum Transmission: string
{
    case Manual    = 'M';
    case Automatic = 'A';

    public function label(): string
    {
        return match ($this) {
            self::Manual    => '4 Speed Manual',
            self::Automatic => '4 Speed Automatic',
        };
    }
}
