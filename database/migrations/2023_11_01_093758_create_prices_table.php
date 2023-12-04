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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('status_id')->constrained('status');
            $table->double('price');
            $table->double('price_last_buy')->nullable();
            $table->double('cost_last_buy')->nullable();
            $table->double('cost_avg')->nullable();
            $table->double('margin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
