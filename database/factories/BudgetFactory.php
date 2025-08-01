<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->words(3, true),
            'total_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'spent_amount' => $this->faker->randomFloat(2, 0, 1000),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
        ];
    }
}
