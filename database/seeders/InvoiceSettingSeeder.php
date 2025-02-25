<?php

namespace Database\Seeders;

use App\Models\InvoiceSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        InvoiceSetting::insert($invoice_settings);
    }
}
