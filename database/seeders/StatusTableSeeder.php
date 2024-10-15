<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = ['property_status_name' => 'Status ' . ($i + 1)];
        }
        DB::table('property_statuses')->insert($data);
    }
}
