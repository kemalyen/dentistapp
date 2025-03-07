<?php

namespace App\Enums;

enum AppointmentDuration:string
{
    case QUARTER_HOUR = '15 minutes';
    case HALF_HOUR = '30 minutes';
    case ONE_HOUR = '1 hour';
 

    public static function duration(string $name): int
    {
        return match ($name) {
            '15 minutes' => 15,
            '30 minutes' => 30,
            '1 hour' => 60,
        };
    }
}