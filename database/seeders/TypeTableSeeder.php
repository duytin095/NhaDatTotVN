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
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'property_type_name' => 'Danh mục' . ($i + 1),
                'property_purpose_id' => rand(0, 2)
            ];
        }
        DB::table('property_types')->insert($data);
    }
}
