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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('cod');
            $table->string('name');
            $table->string('sku');
            $table->string('bar_code');
            $table->foreignId('product_categorie_id')->constrained('product_categories')->nullable();
            $table->foreignId('mark_id')->constrained('marks')->nullable();
            $table->foreignId('supplier_id')->constrained('suppliers')->nullable();
            $table->foreignId('measure_id')->constrained('measures')->nullable();
            $table->foreignId('status_id')->constrained('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
