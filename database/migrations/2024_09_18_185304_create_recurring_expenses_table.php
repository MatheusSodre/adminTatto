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
        Schema::create('recurring_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->date('start_date'); // Data de início da recorrência
            $table->enum('frequency', ['month', 'quarterly', 'annual']); // Frequência
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurring_expenses');
    }
};
