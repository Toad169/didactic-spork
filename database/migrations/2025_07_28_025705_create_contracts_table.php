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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['wadiah', 'mudharabah', 'wakalah'])->default('wadiah');
            $table->text('terms'); // Assuming this is a text field for the contract terms
            $table->timestamp('signed_at');
            $table->timestamp('expires_at');
            // $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreignId('approved_by')->constrained('users')->onDelete('set null'); // Assuming this is the user who approved the contract
            // $table->timestamp('approved_at')->nullable(); // Assuming this is the time when the
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
