<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Comentarios
     * ['à vista' = cash, 'à prazo', = paymentInstallments, 'entrada + parcelas' = downPaymentInstallments]
     */
    public function up(): void
    {
        Schema::create('payment_conditions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['cash', 'paymentInstallments', 'downPaymentInstallments']);
            $table->integer('installments')->nullable()->default(0); // Número de parcelas
            $table->decimal('down_payment', 10, 2)->nullable()->default(0.00); // Valor de entrada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_conditions');
    }
};
