<?php

namespace Database\Seeders;

use App\Models\WarehouseRack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseRackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        WarehouseRack::insert($warehouse_racks);
    }
}
