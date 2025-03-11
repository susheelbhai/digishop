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
        Schema::create('business_user_relations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('business_id')->references('id')->on('businesses');
            $table->foreignId('user_id')->references('id')->on('business_owners');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_user_relations');
    }
};
