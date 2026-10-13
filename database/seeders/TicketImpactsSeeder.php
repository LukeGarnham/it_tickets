<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketImpactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_impacts')->insert([
            ['impact' => "I can do my task but the issue is annoying"],
            ['impact' => "I can't do my task properly but I have a workaround"],
            ['impact' => "I can't complete my task but can complete other work"],
            ['impact' => "I can't complete my task and I have a deadline to meet"],
            ['impact' => "I can't do any work"]
        ]);
    }
}
