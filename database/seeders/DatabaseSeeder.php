<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Accounts;
use App\Models\Budget;
use App\Models\Goals;
use App\Models\Reports;
use App\Models\Savings;
use App\Models\Transactions;
use App\Models\Transfers;
use App\Models\Contracts;
use App\Models\Logs;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        User::factory(4)->create()->each(function ($user) {
            // Each user gets 1-2 accounts
            $accounts = Accounts::factory(rand(1,2))->create(['user_id' => $user->id]);

            // Each user gets 1-3 budgets
            Budget::factory(rand(1,3))->create(['user_id' => $user->id]);

            // Each user gets 1-3 goals
            Goals::factory(rand(1,3))->create(['user_id' => $user->id]);

            // Each user gets 1-2 contracts
            Contracts::factory(rand(1,2))->create(['user_id' => $user->id, 'approved_by' => $user->id]);

            // Each user gets 2-5 logs
            Logs::factory(rand(2,5))->create(['user_id' => $user->id]);

            // Each user gets 1-2 reports
            Reports::factory(rand(1,2))->create(['user_id' => $user->id, 'generated_by' => $user->id]);

            // For each account, create savings, transactions
            foreach ($accounts as $account) {
                Savings::factory(rand(1,2))->create(['account_id' => $account->id]);
                Transactions::factory(rand(2,5))->create(['account_id' => $account->id, 'performed_by' => $user->id]);
            }
        });

        // Create some random transfers between accounts
        $allAccounts = Accounts::all();
        if ($allAccounts->count() > 1) {
            for ($i = 0; $i < 10; $i++) {
                $sender = $allAccounts->random();
                $receiver = $allAccounts->where('id', '!=', $sender->id)->random();
                Transfers::factory()->create([
                    'sender_account_id' => $sender->id,
                    'receiver_account_id' => $receiver->id,
                ]);
            }
        }
    }
}
