<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accounts>
 */
class AccountsFactory extends Factory
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
            'account_number' => $this->faker->unique()->bankAccountNumber(),
            'account_type' => $this->faker->randomElement(['savings', 'checking', 'business', 'qurban', 'umrah', 'other']),
            'balance' => $this->faker->randomFloat(2, 1000, 100000),
            'currency' => 'IDR',
            'status' => $this->faker->randomElement(['active', 'inactive', 'closed']),
            'opened_at' => $this->faker->date(),
            'closed_at' => null,
        ];
    }
}
