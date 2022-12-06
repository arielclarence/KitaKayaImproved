<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
            'umur' => $this->faker->numberBetween(17, 50),
            'role' => 1,
            'exp' => 0,
            'status' => 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    // public function unverified()
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
