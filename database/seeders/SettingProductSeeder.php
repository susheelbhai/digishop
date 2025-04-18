<?php

namespace Database\Seeders;

use App\Models\SettingProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        SettingProduct::insert($settings_product);
    }
}
