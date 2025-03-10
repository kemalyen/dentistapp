<?php

namespace App\Rules;

use App\Enums\AppointmentDuration;
use App\Models\Appointment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class AppointmentAvailability implements ValidationRule
{

    public function __construct(
        private string $starts_at,
        private string $time,
        private string $duration,
        private int $doctor_id,
        private int $appointment_id = 0
    ) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $starts_at = Carbon::createFromFormat('Y-m-d H:i', ($this->starts_at . ' ' . $this->time));


        $ends_at = $starts_at->copy()->addMinutes(AppointmentDuration::duration($this->duration));

        $exists =  Appointment::where('doctor_id', $this->doctor_id)
            ->whereBetween('starts_at', [$starts_at, $ends_at])
            ->whereBetween('ends_at', [$starts_at, $ends_at])
            ->where()
            ->where('id', '!=', $this->appointment_id)
            ->exists();

        if ($exists) {
            $fail('This time slot is not available');
        }
    }
}
