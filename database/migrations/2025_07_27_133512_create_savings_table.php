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
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->string('title', 255);
            $table->decimal('target_amount', 16, 2);
            $table->decimal('current_amount', 16, 2)->default(0.00);
            $table->enum('status', ['active', 'inactive', 'closed'])->default('active');
            $table->boolean('is_locked')->default(false);
            $table->date('deadline')->nullable();
            $table->timestamps(); // This automatically adds both created_at and updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savings');
    }
};
