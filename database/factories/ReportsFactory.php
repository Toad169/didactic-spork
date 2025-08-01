<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports>
 */
class ReportsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'report_type' => $this->faker->randomElement(['profit_sharing', 'summary', 'audit']),
            'period_start' => $this->faker->dateTimeBetween('-2 years', '-1 year')->format('Y-m-d'),
            'period_end' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'content' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['draft', 'finalized', 'archived']),
            'generated_by' => User::factory(),
        ];
    }
}
