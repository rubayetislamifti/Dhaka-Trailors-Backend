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
        Schema::create('lower_measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('length2')->nullable();
            $table->string('body2')->nullable();
            $table->string('west')->nullable();
            $table->string('hi')->nullable();
            $table->string('run')->nullable();
            $table->boolean('back_pocket')->default(false)->nullable();
            $table->boolean('front_mobile_pocket')->default(false)->nullable();
            $table->boolean('right_pocket_chain')->default(false)->nullable();
            $table->boolean('double_pocket_chain')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lower_measurements');
    }
};
