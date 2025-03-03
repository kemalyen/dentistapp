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
        return [
            'status' => $this->faker->randomElement(array_column(AppointmentStatus::cases(), 'value')),
            'date' => Carbon::make($this->faker->dateTimeBetween('now', '+3 week'))->setMinutes($this->faker->randomElement([0, 30]))
        ];
    }
}
