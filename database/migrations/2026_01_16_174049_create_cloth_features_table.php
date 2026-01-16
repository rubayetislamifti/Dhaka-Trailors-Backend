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
        Schema::create('cloth_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('sherwani_collar');
            $table->string('brand_collar');
            $table->string('shirt_collar');
            $table->boolean('chest_pocket')->default(false);
            $table->boolean('chest_pocket_sticker')->default(false);
            $table->boolean('chain_pocket')->default(false);
            $table->boolean('bottom_no')->default(false);
            $table->string('isnaf_bottom_no');
            $table->string('metal_bottom_no');
            $table->boolean('cuffs')->default(false);
            $table->boolean('coughlin_sleeves')->default(false);
            $table->boolean('black_color')->default(false);
            $table->string('tira');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloth_features');
    }
};
