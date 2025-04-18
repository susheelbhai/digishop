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
        Schema::create('businesses', function (Blueprint $table) {
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
            $table->string('bank_name')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('bank_swift')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_holder_name')->nullable();
            $table->string('payment_terms')->nullable();
            $table->foreignId('partner_id')->nullable()->references('id')->on('partners');
            $table->foreignId('admin_id')->nullable()->references('id')->on('admins');
            $table->foreignId('approved_by')->nullable()->references('id')->on('admins');
            $table->foreignId('business_onboard_application_id')->nullable()->references('id')->on('business_onboard_applications');
            $table->string('authorised_sign')->nullable();
            $table->string('authorised_stamp')->nullable();
            $table->tinyInteger('invoice_start_id')->default(1);
            $table->foreignId('subscription_type_id')->nullable()->references('id')->on('subscription_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
