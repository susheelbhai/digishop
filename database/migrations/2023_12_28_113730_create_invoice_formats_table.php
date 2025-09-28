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
        Schema::create('invoice_formats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('tax_type_id')->default(2)->references('id')->on('tax_types');
            $table->string('slug');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_formats');
    }
};
