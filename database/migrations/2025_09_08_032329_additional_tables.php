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
        //
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('account_number')->unique();
            $table->enum('account_type', ['savings', 'current', 'fixed'])->default('savings');
            $table->string('title')->nullable();
            $table->enum('status', ['active', 'inactive', 'closed'])->default('active');
            $table->timestamps();
        });

        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('contract_id')->nullable()->constrained('contracts')->onDelete('set null'); // Link to contract
            $table->string('reference_number')->unique(); // Transaction reference
            $table->foreignId('related_transaction_id')->nullable()->constrained('transactions')->onDelete('set null');
            $table->enum('transaction_type', ['deposit', 'withdrawal', 'transfer'])->default('deposit');
            $table->decimal('amount', 20, 2);
            $table->decimal('balance_after', 20, 2)->nullable(); // Balance after transaction
            $table->string('description')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->json('metadata')->nullable(); // Additional transaction data
            $table->timestamp('transaction_date')->useCurrent();
            $table->timestamps();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->string('contract_number')->unique();
            $table->enum('contract_type', ['murabaha', 'mudarabah', 'ijarah', 'musharakah'])->default('murabaha');
            $table->string('title');
            $table->decimal('profit_rate', 5, 2)->default(0.00);
            $table->decimal('principal_amount', 20, 2)->nullable(); // For murabaha/financing
            $table->decimal('total_amount', 20, 2)->nullable(); // Total including profit
            $table->integer('term_months')->nullable(); // Contract duration
            $table->json('terms_conditions')->nullable(); // Store contract terms
            $table->timestamp('signed_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'active', 'completed', 'cancelled'])->default('draft');
            $table->timestamps();
        });

        Schema::create('profit_distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('contract_id')->constrained('contracts')->onDelete('cascade');
            $table->decimal('profit_amount', 20, 2)->default(0.00);
            $table->timestamp('distributed_at')->useCurrent();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->enum('fee_type', ['maintenance', 'transaction', 'penalty'])->default('maintenance');
            $table->decimal('amount', 20, 2);
            $table->timestamp('applied_at')->useCurrent();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('zakats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->decimal('income', 20, 2)->default(0.00);
            $table->decimal('savings', 20, 2)->default(0.00);
            $table->decimal('gold', 20, 2)->default(0.00);
            $table->decimal('silver', 20, 2)->default(0.00);
            $table->decimal('assets', 20, 2)->default(0.00);
            $table->decimal('debts', 20, 2)->default(0.00);
            $table->decimal('total_wealth', 20, 2)->default(0.00);
            $table->decimal('nisab_threshold', 20, 2)->default(0.00);
            $table->decimal('zakatable_amount', 20, 2)->default(0.00);
            $table->decimal('zakat_due', 20, 2)->default(0.00);
            $table->year('calculation_year');
            $table->boolean('paid')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->index(['user_id', 'status']);
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->index(['account_id', 'transaction_date']);
            $table->index(['status', 'transaction_date']);
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->index(['contract_type', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('fees');
        Schema::dropIfExists('profit_distributions');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('savings');
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('zakats');

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'status']);
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->dropIndex(['account_id', 'transaction_date']);
            $table->dropIndex(['status', 'transaction_date']);
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->dropIndex(['contract_type', 'status']);
        });
    }
};
