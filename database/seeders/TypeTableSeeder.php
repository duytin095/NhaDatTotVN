<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = ['property_type_name' => 'Property Type ' . ($i + 1)];
        }
        DB::table('property_types')->insert($data);
    }
}
