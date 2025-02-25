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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->foreignId('responsible_person_type')->nullable()->references('id')->on('user_types');
            $table->string('responsible_person_id')->nullable();
            // $table->foreignId('actionable_person_type')->nullable()->references('id')->on('user_types');
            $table->string('actionable_person_id')->nullable();
            $table->foreignId('ticket_title_id')->nullable()->references('id')->on('ticket_titles');
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
