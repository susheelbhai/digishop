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
        Schema::create('invoice_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('business_id')->references('id')->on('businesses');
            $table->foreignId('tax_type_id')->default(2)->references('id')->on('tax_types');
            $table->foreignId('invoice_format_id')->default(1)->references('id')->on('invoice_formats');
            $table->foreignId('invoice_number_format_id')->default(1)->references('id')->on('invoice_number_formats');
            $table->boolean('authorised_sign')->default(1);
            $table->boolean('authorised_stamp')->default(1);
            $table->boolean('bank_detail')->default(1);
            $table->boolean('pan')->default(1);
            $table->boolean('gstin')->default(1);
            $table->boolean('payment_terms')->default(1);
            $table->boolean('amount_in_words')->default(1);
            $table->string('invoice_number_prefix')->nullable();
            $table->string('invoice_number_suffix')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_settings');
    }
};
