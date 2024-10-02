<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * ['despesa' = expense, 'receita' = receivable, 'compra' = purchase, 'venda' = sale]
     * ['pendente' = pending, 'pago' = paid, 'cancelado' = cancelled]
     *
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['expense', 'receivable', 'purchase', 'sale']);
            $table->decimal('amount', 10, 2);
            $table->string('description')->nullable();
            $table->date('transaction_date');
            $table->date('due_date')->nullable(); // Para transações a prazo
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable(); // Usado para contas a receber ou vendas
            $table->unsignedBigInteger('payment_condition_id')->nullable(); // Condição de pagamento
            $table->timestamps();

            // Definição de chaves estrangeiras
            $table->foreign('category_id')->references('id')->on('categories_payments')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->foreign('payment_condition_id')->references('id')->on('payment_conditions')->onDelete('set null');
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
