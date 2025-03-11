<?php

namespace Database\Seeders;

use App\Models\BusinessOwner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        BusinessOwner::insert($users);
    }
}
