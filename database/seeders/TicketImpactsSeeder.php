<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketImpactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now()->toDateTimeString();
        DB::table('ticket_impacts')->upsert([
            ['name' => "I can do my task but the issue is annoying", 'created_at' => $now, 'updated_at' => $now],
            ['name' => "I can't do my task properly but I have a workaround", 'created_at' => $now, 'updated_at' => $now],
            ['name' => "I can't complete my task but can complete other work", 'created_at' => $now, 'updated_at' => $now],
            ['name' => "I can't complete my task and I have a deadline to meet", 'created_at' => $now, 'updated_at' => $now],
            ['name' => "I can't do any work", 'created_at' => $now, 'updated_at' => $now]
        ], ['name'], ['name']);
    }
}
