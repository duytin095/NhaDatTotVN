<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'assets/media/images/default-post-img-0.jpg',
            'assets/media/images/default-post-img-1.jpg',
            'assets/media/images/default-post-img-2.jpg',
            'assets/media/images/default-post-img-3.jpg',
            'assets/media/images/default-post-img-4.jpg',
        ];
        $description = 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin quis bibendum auctor, nisilit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu. Gravida nibh vel velit auctor aliquet. Aenean sollicitudin quis bibendum auctor, nisilit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi acnec tellus a odio tincidunt auctor a ornare odio.';
        $data = [];
        for ($i = 0; $i < 8; $i++) {
            $numImages = rand(1, count($images));
            $randomImages = array_slice($images, rand(0, count($images) - $numImages), $numImages);
            $data[] = [
                'property_type_id' => rand(1, 8),
                'property_name' => 'Imo, this ' . ($i + 1) . ' was probably Miyeon and Yuqi’s song!! Both of their raps ate and MIYEONS VOCALS!!',
                'property_description' => $description,
                'property_image' => json_encode($randomImages),
                'property_address' => '53 An Hoi, Thị trấn An Phú, Huyện An Phú, An Giang',
                'property_address_number' => '53',
                'property_street' => 'An Hoi',
                'property_ward' => 'Thị trấn An Phú',
                'property_province' => 'An Giang',
                'property_district' => 'Huyện An Phú',
                'property_price' => rand(0, 100000),

                'property_seller_id' => 1,
                'property_label' => rand(0, 5),
                'slug' => 'property-' . ($i + 1),

                'created_at' => Carbon::now()->addDays($i),
                'updated_at' => Carbon::now()->addDays($i + 1),
            ];
        }
        DB::table('properties')->insert($data);
    }
}
