<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * ['pendente', 'pago', 'cancelado']
     *
     */
    public function up(): void
    {
        Schema::create('transaction_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date')->nullable();
            $table->integer('installment_number')->nullable(); // Número da parcela
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->timestamps();

            // Definição de chaves estrangeiras
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_payments');
    }
};
