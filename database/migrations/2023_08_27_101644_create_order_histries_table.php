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
        Schema::create('order_histries', function (Blueprint $table) {



            $table->id();
            $table->integer('product_id');
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->string('brand_name')->nullable();
            $table->string('model')->nullable();
            $table->string('image')->nullable();
            $table->integer('contacted_seller')->nullable();
            $table->integer('product_delivered')->nullable();
            $table->integer('product_received')->nullable();
            $table->integer('product_refunded')->nullable();
            $table->date('buyTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_histries');
    }
};
