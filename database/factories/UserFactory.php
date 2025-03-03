<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;


        /**
     * Indicate that the user is an admin.
     *
     * @return Factory
     */
    public function admin(): UserFactory
    {
        return $this->assignRole('admin');
    }

    /**
     * Indicate that the user is a patient.
     *
     * @return Factory
     */
    public function patient(): UserFactory
    {
        return $this->assignRole('patient');
    }

        /**
     * Indicate that the user is an admin.
     *
     * @return Factory
     */
    public function user(): UserFactory
    {
        return $this->assignRole('user');
    }

    /**
     * @param array|\Spatie\Permission\Contracts\Role|string  ...$roles
     * @return UserFactory
     */
    private function assignRole(...$roles): UserFactory
    {
        return $this->afterCreating(fn (User $user) => $user->syncRoles($roles));
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
