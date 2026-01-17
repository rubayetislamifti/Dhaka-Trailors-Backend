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
        Schema::create('upper_measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('length')->nullable();
            $table->string('body')->nullable();
            $table->string('belly')->nullable();
            $table->string('tira2')->nullable();
            $table->string('sleeves')->nullable();
            $table->string('hem')->nullable();
            $table->string('neck')->nullable();
            $table->string('chest_open')->nullable();
            $table->string('chest_loose')->nullable();
            $table->string('belly_loose')->nullable();
            $table->string('lower_enclouser')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upper_measurements');
    }
};
