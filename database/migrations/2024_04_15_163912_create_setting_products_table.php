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
        Schema::create('settings_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('business_id')->nullable()->references('id')->on('businesses');
            $table->tinyInteger('default_gst_percentage')->default(18);
            $table->boolean('auto_print_bar_code')->default(1);
            $table->boolean('add_product_while_order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings_product');
    }
};
