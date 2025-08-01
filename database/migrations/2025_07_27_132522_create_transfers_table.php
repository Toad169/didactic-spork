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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_account_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('receiver_account_id')->constrained('accounts')->onDelete('cascade');
            $table->decimal('amount', 16, 2);
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            // $table->timestamp('performed_at')->nullable(); // Assuming this is the time when the transaction was performed
            // $table->timestamp('completed_at')->nullable(); // Assuming this is the time when the
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
