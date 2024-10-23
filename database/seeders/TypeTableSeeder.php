<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'property_purpose_id' => rand(0, 2),
                // 'property_type_image' => json_encode('assets/user/images/default-type.jpg'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('property_types')->insert($data);
    }
}
