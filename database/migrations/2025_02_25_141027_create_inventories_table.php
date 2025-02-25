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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('business_id')->references('id')->on('businesses');
            $table->foreignId('warehouse_rack_id')->references('id')->on('warehouse_racks');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('order_id')->nullable()->references('id')->on('orders');
            $table->integer('quantity')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('purchase_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
