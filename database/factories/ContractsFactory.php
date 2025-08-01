<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contracts>
 */
class ContractsFactory extends Factory
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
            'type' => $this->faker->randomElement(['wadiah', 'mudharabah', 'wakalah']),
            'terms' => $this->faker->paragraph(),
            'signed_at' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
            'expires_at' => $this->faker->dateTimeBetween('now', '+2 years')->format('Y-m-d H:i:s'),
            'approved_by' => User::factory(),
        ];
    }
}
