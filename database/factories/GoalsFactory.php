<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goals>
 */
class GoalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->words(2, true),
            'target_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'saved_amount' => $this->faker->randomFloat(2, 0, 5000),
            'expected_date' => $this->faker->dateTimeBetween('+1 month', '+2 years')->format('Y-m-d'),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'is_achieved' => $this->faker->boolean(20),
        ];
    }
}
