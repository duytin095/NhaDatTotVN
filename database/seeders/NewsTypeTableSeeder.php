<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Kiến thức chung về bất động sản',
            'Kiến thức mua bán bất động sản',
            'Phong thủy trong bất động sản',
            'Cẩm nang và kinh nghiệm về nghề môi giới bất động sản',
            'Tổng hợp kiến thức về kiến trúc và thiết kế nội thất',
            'Tin tức dự án bất động sản',
            'Tin tức về thị trường bất động sản',
        ];
        foreach ($data as $item) {
            \App\Models\NewsType::create([
                'name' => $item,
            ]);
        }
    }
}
