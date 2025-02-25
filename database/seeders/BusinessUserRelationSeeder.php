<?php

namespace Database\Seeders;

use App\Models\BusinessUserRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessUserRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        BusinessUserRelation::insert($business_user_relations);
    }
}
