<?php

namespace Database\Seeders;

use App\Models\BusinessOnboardApplication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessOnboardApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        BusinessOnboardApplication::insert($business_onboard_applications);
    }
}
