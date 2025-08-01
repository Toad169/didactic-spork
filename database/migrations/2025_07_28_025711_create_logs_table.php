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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('action');
            $table->text('description')->nullable(); // Optional description of the action
            $table->string('ip_address')->nullable(); // Optional IP address of the user performing the action
            $table->string('user_agent')->nullable(); // Optional user agent string for the action
            // $table->timestamp('created_at')->useCurrent(); // Automatically set the current timestamp when
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
