<?php

namespace Database\Seeders;

use App\Models\SubscriptionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionType::factory()->create([
            'name' => 'prepaid',
        ]);
        SubscriptionType::factory()->create([
            'name' => 'postpaid',
        ]);
        SubscriptionType::factory()->create([
            'name' => 'unlimited',
        ]);
    }
}
