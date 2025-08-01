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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('report_type', ['profit_sharing', 'summary', 'audit']);
            $table->date('period_start'); // Assuming this is the start date of the report period
            $table->date('period_end'); // Assuming this is the end date of the report period
            $table->text('content')->nullable(); // Optional content of the report
            $table->enum('status', ['draft', 'finalized', 'archived'])->default('draft'); // Status of the report
            // $table->unsignedBigInteger('created_by')->nullable();
            $table->foreignId('generated_by')->constrained('users')->onDelete('cascade'); // User who created the report
            // $table->timestamp('created_at')->useCurrent(); // Automatically set the current timestamp when the report is created
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
