<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BonusTierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bonus_tiers')->insert([
            'min_amount' => 100000,
            'max_amount' => 500000,
            'percentage' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('bonus_tiers')->insert([
            'min_amount' => 500000,
            'max_amount' => 1500000,
            'percentage' => 15,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('bonus_tiers')->insert([
            'min_amount' => 1500000,
            'max_amount' => 2000000,
            'percentage' => 20,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('bonus_tiers')->insert([
            'min_amount' => 2000000,
            'max_amount' => 4000000,
            'percentage' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('bonus_tiers')->insert([
            'min_amount' => 4000000,
            'max_amount' => 10000000,
            'percentage' => 40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
