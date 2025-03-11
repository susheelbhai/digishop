<?php

namespace Database\Seeders;

use App\Models\BusinessDataChange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessDataChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        BusinessDataChange::insert($business_employees);
    }
}
