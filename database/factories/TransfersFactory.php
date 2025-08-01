<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Accounts;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfers>
 */
class TransfersFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sender_account_id' => Accounts::factory(),
            'receiver_account_id' => Accounts::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 10000),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
