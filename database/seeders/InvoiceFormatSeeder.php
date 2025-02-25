<?php

namespace Database\Seeders;

use App\Models\InvoiceFormat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvoiceFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        InvoiceFormat::insert($invoice_formats);
    }
}
