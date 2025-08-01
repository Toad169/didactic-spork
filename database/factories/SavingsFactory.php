<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Accounts;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Savings>
 */
class SavingsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'account_id' => Accounts::factory(),
            'title' => $this->faker->words(2, true),
            'target_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'current_amount' => $this->faker->randomFloat(2, 0, 5000),
            'status' => $this->faker->randomElement(['active', 'inactive', 'closed']),
            'is_locked' => $this->faker->boolean(10),
            'deadline' => $this->faker->dateTimeBetween('+1 month', '+2 years')->format('Y-m-d'),
        ];
    }
}
