<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessOnboardApplication>
 */
class BusinessOnboardApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'registration_number' => fake()->phoneNumber(),
            'gst_number' => fake()->phoneNumber(),
            'address' => fake()->sentence(),
            'city' => fake()->city(),
            'pin' => fake()->postcode(),
            'state_id' => 7,
            'owner_name' => fake()->name(),
            'owner_phone' => fake()->phoneNumber(),
            'owner_email' => fake()->safeEmail(),
            'bank_address' => fake()->phoneNumber(),
            'ifsc' => fake()->phoneNumber(),
            'account_holder_name' => fake()->name(),
            'account_number' => fake()->phoneNumber(),
            'iec_code' => fake()->phoneNumber(),
            'ad_code' => fake()->phoneNumber(),
            'arn_code' => fake()->phoneNumber(),
            'payment_terms' => fake()->sentence(),
            'partner_id' => rand(1,2),
            
        ];
    }
}
