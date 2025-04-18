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
        Schema::create('business_owners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('business_id')->references('id')->on('businesses');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('designation')->nullable();
            $table->string('profile_pic')->nullable('dummy.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('gender_id')->default(1)->references('id')->on('user_genders');
            $table->foreignId('theme_id')->default(1)->references('id')->on('themes');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_owners');
    }
};
