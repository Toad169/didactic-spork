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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->decimal('target_amount', 16, 2);
            $table->decimal( 'saved_amount', 16, 2)->default(0.00);
            $table->date('expected_date')->nullable(); // Assuming this is the expected date to reach the goal
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Assuming this is the priority of the goal
            $table->boolean('is_achieved')->default(false); // Assuming this is a flag to indicate if the goal has been achieved
            // $table->timestamp('created_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
