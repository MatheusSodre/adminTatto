<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * ['despesa' =  expense, 'receita' = revenue]
     */
    public function up(): void
    {
        Schema::create('categories_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('type', ['expense', 'revenue']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_payments');
    }
};
