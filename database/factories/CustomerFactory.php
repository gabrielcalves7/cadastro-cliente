<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthDate' => $this->faker->date('Y-m-d'),
            'document' => $this->faker->numberBetween(0,2147483647),
            'created_at' => now(),
            'updated_at' => now(),
            //
        ];
    }
}
