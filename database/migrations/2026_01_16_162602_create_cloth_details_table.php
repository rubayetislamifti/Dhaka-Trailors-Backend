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
        Schema::create('cloth_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->boolean('little_punjabi')->default(false);
            $table->boolean('kalidar_punjabi')->default(false);
            $table->boolean('madani_punjabi')->default(false);
            $table->boolean('little_robe')->default(false);
            $table->boolean('arabian_robe')->default(false);
            $table->boolean('kabli')->default(false);
            $table->boolean('fatwa')->default(false);
            $table->boolean('salwar')->default(false);
            $table->boolean('pajama_cutting')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloth_details');
    }
};
