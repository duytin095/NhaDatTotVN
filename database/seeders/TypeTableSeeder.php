<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
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

        $sell = [
            'Bán căn hộ chung cư',
            'Bán nhà',
            'Bán nhà biệt thự, liền kề',
            'Bán nhà mặt phố',
            'Bán đất nền dự án',
            'Bán đất',
            'Bán kho, nhà xưởng',
            'Bán loại bất động sản khác',
            'Bán khách sạn',
        ];
        $rent = [
            'Cho thuê căn hộ chung cư',
            'Cho thuê nhà riêng',
            'Cho thuê nhà mặt phố',
            'Cho thuê văn phòng',
            'Cho thuê phòng trọ, nhà trọ',
            'Cho thuê cửa hàng, kiot',
            'Cho thuê kho, nhà xưởng, đất',
            'Cho thuê loại bất động sản khác',
        ];
        $invest = [
            'Căn hộ chung cư',
            'Cao ốc văn phòng',
            'Trung tâm thương mại',
            'Khu đô thị mới',
            'Khu phức hợp',
            'Nhà ở xã hội',
            'Khu nghỉ dưỡng, sinh thái',
            'Khu công nghiệp',
            'Biệt thự liền kê',
            'Dự án khác',
        ];

        foreach ($sell as $key => $value) {
            $data[] = [
                'property_type_name' => $value,
                'property_purpose_id' => 0,
                'slug' => Str::slug($value) . '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        foreach ($rent as $key => $value) {
            $data[] = [
                'property_type_name' => $value,
                'property_purpose_id' => 1,
                'slug' => Str::slug($value) . '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        foreach( $invest as $key => $value) {
            $data[] = [
                'property_type_name' => $value,
                'property_purpose_id' => 2,
                'slug' => Str::slug($value). '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('property_types')->insert($data);
    }
}
