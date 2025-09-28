<?php

namespace Database\Seeders;

use App\Models\TaxType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxType::factory()->create([
            'title' => 'No Tax',
        ]);
        TaxType::factory()->create([
            'title' => 'GST',
        ]);
    }
}
