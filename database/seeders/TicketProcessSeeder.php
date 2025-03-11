<?php

namespace Database\Seeders;

use App\Models\TicketProcess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include('data/data.php');
        TicketProcess::insert($ticket_processes);
    }
}
