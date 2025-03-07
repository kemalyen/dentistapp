<?php

namespace App\Enums;

enum AppointmentStatus:string
{
    case ACTIVE = 'Active';
    case PENDING = 'Pending';
    case CANCELLED = 'Cancelled';
    case COMPLETED = 'Completed';

    public function appointmentStatus(string $name): string
    {
        return match ($name) {
            'Active' => self::ACTIVE->value,
            'Pending' => self::PENDING->value,
            'Cancelled' => self::CANCELLED->value,
        };
    }
}