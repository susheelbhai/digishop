<?php

namespace Database\Seeders;

use App\Models\BusinessOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        BusinessOwner::insert($business_owners);
    }
}
