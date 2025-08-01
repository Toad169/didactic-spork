<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->decimal('total_amount', 16, 2); // Assuming this is the total budget amount
            $table->decimal('spent_amount', 16, 2)->default(0.00); // Assuming this is the amount already spent from the budget
            $table->date('start_date'); // Assuming this is the start date of the budget period
            $table->date('end_date'); // Assuming this is the end date of
            // $table->timestamp('created_at')->useCurrent(); // Automatically set the current timestamp when the budget is created
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
