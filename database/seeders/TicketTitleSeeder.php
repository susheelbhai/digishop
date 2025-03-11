<?php

namespace Database\Seeders;

use App\Models\TicketTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        TicketTitle::insert($ticket_titles);
    }
}
