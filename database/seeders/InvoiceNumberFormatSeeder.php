<?php

namespace Database\Seeders;

use App\Models\InvoiceNumberFormat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceNumberFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        InvoiceNumberFormat::insert($invoice_number_formats);
    }
}
