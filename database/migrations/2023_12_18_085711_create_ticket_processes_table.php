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
        Schema::create('ticket_processes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('ticket_number')->nullable()->references('id')->on('tickets');
            $table->foreignId('ticket_title_id')->nullable()->references('id')->on('ticket_titles');
            // $table->foreignId('responsible_person_type')->nullable()->references('id')->on('user_types');
            $table->string('responsible_person_id')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_processes');
    }
};
