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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
           $table->integer('product_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('oldprice')->nullable();
            $table->string('image')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->integer('count')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
