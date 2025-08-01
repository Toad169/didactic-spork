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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->enum('type', ['deposit', 'withdrawal', 'profit', 'transfer', 'hibah', 'fee'])->default('deposit');
            $table->decimal('amount', 16, 2);
            $table->text('description')->nullable();
            $table->text('sharia_basis')->nullable();
            $table->enum('status', ['pending', 'completed', 'rejected'])->default('pending');
            // $table->unsignedBigInteger('performed_by')->nullable();
            $table->foreignId('performed_by')->references('id')->on('users')->onDelete('set null'); // Adjust as necessary
            // $table->timestamp('performed_at')->nullable(); // Assuming this is the time when the transaction was performed
            // $table->timestamp(column: 'completed_at')->nullable(); // Assuming this is the time when the
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
