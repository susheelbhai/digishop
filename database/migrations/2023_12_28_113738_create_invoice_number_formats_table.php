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
        Schema::create('invoice_number_formats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug');
            $table->string('name');
            $table->string('sample1')->nullable();
            $table->string('sample2')->nullable();
            $table->string('sample3')->nullable();
            $table->boolean('state_code')->default(0);
            $table->string('state_code_suffix')->default('');
            $table->smallInteger('financial_year')->default(0);
            $table->smallInteger('financial_year_hint')->default(0);
            $table->string('financial_year_interfix')->default('');
            $table->string('financial_year_suffix')->default('');
            $table->smallInteger('business_order_id_digit')->default(0);
            $table->string('explanation')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_number_formats');
    }
};
