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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('account_number')->unique();
            $table->enum('account_type', ['savings', 'checking', 'business', 'qurban', 'umrah', 'other'])->default('savings');
            $table->decimal('balance', 16, 2)->default(0.00);
            $table->string('currency', 3)->default('IDR');
            $table->enum('status', ['active', 'inactive', 'closed'])->default('active');
            $table->date('opened_at')->nullable();
            $table->date('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
