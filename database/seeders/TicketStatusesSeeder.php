<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now()->toDateTimeString();
        DB::table('ticket_statuses')->upsert([
            ['name' => 'New', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Waiting For Owner', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ongoing', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Closed', 'created_at' => $now, 'updated_at' => $now]
        ], ['name'], ['name']);
    }
}
