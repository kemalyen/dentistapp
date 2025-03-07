<?php

namespace Database\Factories;

use App\Enums\AppointmentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = Carbon::make($this->faker->dateTimeBetween('now', '+3 week'))
            ->setMinutes($this->faker->randomElement([0, 30]));
        $endsAt = $startsAt->clone()->addHours($this->faker->numberBetween(1, 3));


        return [
            'status' => $this->faker->randomElement(array_column(AppointmentStatus::cases(), 'value')),
            'starts_at' => $startsAt,
            'ends_at' => $endsAt
        ];
    }
}
