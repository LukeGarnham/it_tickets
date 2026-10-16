<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now()->toDateTimeString();
        DB::table('categories')->upsert([
            ['name' => 'Hardware', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Software', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Access', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Network', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Website(s)', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Backups', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Other', 'created_at' => $now, 'updated_at' => $now]
        ], ['name'], ['name']);
    }
}
