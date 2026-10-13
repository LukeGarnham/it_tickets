<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_statuses')->insert([
            ['status' => 'New'],
            ['status' => 'Waiting For Owner'],
            ['status' => 'Ongoing'],
            ['status' => 'Closed']
        ]);
    }
}
