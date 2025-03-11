<?php

namespace Database\Seeders;

use App\Models\UserGender;
use Database\Factories\UserGenderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        UserGender::insert($user_genders);
    }
}
