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
        Schema::create('business_onboard_applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('pin')->nullable();
            $table->foreignId('state_id')->references('id')->on('states');
            $table->string('logo')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('gst_certificate')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('registration_certificate')->nullable();
            $table->string('iec_code')->nullable();
            $table->string('ad_code')->nullable();
            $table->string('arn_code')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('owner_photo')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('bank_swift')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_holder_name')->nullable();
            $table->string('payment_terms')->nullable();
            $table->foreignId('partner_id')->nullable()->references('id')->on('partners');
            $table->foreignId('admin_id')->nullable()->references('id')->on('admins');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->string('authorised_sign')->nullable();
            $table->string('authorised_stamp')->nullable();
            $table->foreignId('subscription_type_id')->nullable()->references('id')->on('subscription_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_onboard_applications');
    }
};
