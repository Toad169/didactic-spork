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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'staff', 'auditor', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('avatar')->nullable();
            $table->string('bio')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('provider');
            $table->string('provider_id')->unique();
            // $table->string('last_four', 4);
            // $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('account_number')->unique();
            // $table->string('bank_name');
            // $table->string('bank_code');
            $table->enum('account_type', ['savings', 'current', 'fixed'])->default('savings');
            $table->string('title')->nullable();
            $table->enum('status', ['active', 'inactive', 'closed'])->default('active');
            $table->timestamps();
        });

        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->string('savings_number')->unique();
            $table->enum('savings_type', ['wadiah', 'mudarabah'])->default('wadiah');
            $table->string('title')->nullable();
            $table->decimal('current_balance', 20, 2)->default(0.00);
            $table->decimal('target_balance', 20, 2)->nullable();
            $table->date('target_date')->nullable();
            $table->string('description')->nullable();
            $table->enum('status', ['active', 'inactive', 'completed', 'closed'])->default('active');
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->foreignId('related_transaction_id')->nullable()->constrained('transactions')->onDelete('set null');
            $table->enum('transaction_type', ['deposit', 'withdrawal', 'transfer'])->default('deposit');
            $table->decimal('amount', 20, 2);
            $table->string('description')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->timestamp('transaction_date')->useCurrent();
            $table->timestamps();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->string('contract_number')->unique();
            $table->enum('contract_type', ['murabaha', 'mudarabah', 'ijarah', 'musharakah'])->default('murabaha');
            $table->string('title');
            $table->decimal('profit_rate', 5, 2)->default(0.00);
            $table->timestamp('signed_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'active', 'completed', 'cancelled'])->default('draft');
            $table->timestamps();
        });

        Schema::create('profit_sharings', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->foreignId('contract_id')->constrained()->onDelete('cascade');
            $table->decimal('profit_amount', 20, 2)->default(0.00);
            $table->timestamp('distributed_at')->useCurrent();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->enum('fee_type', ['maintenance', 'transaction', 'penalty'])->default('maintenance');
            $table->decimal('amount', 20, 2);
            $table->timestamp('applied_at')->useCurrent();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('savings');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('profit_sharings');
        Schema::dropIfExists('fees');
    }
};
