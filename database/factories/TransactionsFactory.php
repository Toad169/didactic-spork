<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Accounts;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => Accounts::factory(),
            'type' => $this->faker->randomElement(['deposit', 'withdrawal', 'profit', 'transfer', 'hibah', 'fee']),
            'amount' => $this->faker->randomFloat(2, 10, 10000),
            'description' => $this->faker->sentence(),
            'sharia_basis' => $this->faker->word(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'rejected']),
            'performed_by' => User::factory(),
        ];
    }
}
