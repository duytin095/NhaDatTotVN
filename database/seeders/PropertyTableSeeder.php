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
        $videoLinks = [
            0 => null,
            1 => 'https://www.youtube.com/watch?v=swXWUfufu2w',
            2 => 'https://www.tiktok.com/@scout2015/video/6718335390845095173',
            // Add more video types and links as needed
        ];

        $description = 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin quis bibendum auctor, nisilit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu. Gravida nibh vel velit auctor aliquet. Aenean sollicitudin quis bibendum auctor, nisilit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi acnec tellus a odio tincidunt auctor a ornare odio.';
        $data = [];

        for ($i = 0; $i < 8; $i++) {
            $numImages = rand(1, count($images));
            $randomImages = array_slice($images, rand(0, count($images) - $numImages), $numImages);
            $propertyVideoType = rand(0, count($videoLinks) - 1); // Generate a random video type
            $data[] = [
                'property_type_id' => rand(1, 8),
                'property_name' => 'Imo, this ' . ($i + 1) . ' was probably Miyeon and Yuqi’s song!! Both of their raps ate and MIYEONS VOCALS!!',
                'property_description' => $description,
                'property_image' => json_encode($randomImages),
                'property_video_type' => $propertyVideoType,
                'property_video_link' => $videoLinks[$propertyVideoType],
                'property_address' => '53 An Hoi, Thị trấn An Phú, Huyện An Phú, An Giang',
                'property_address_number' => '53',
                'property_street' => 'An Hoi',
                'property_ward' => 'Thị trấn An Phú',
                'property_province' => 'An Giang',
                'property_district' => 'Huyện An Phú',
                'property_price' => rand(0, 10000000),

                'property_seller_id' => rand(1, 10),
                'property_label' => rand(0, 4),
                'slug' => 'property-' . ($i + 1),

                'created_at' => Carbon::now()->addDays($i),
                'updated_at' => Carbon::now()->addDays($i + 1),
            ];
        }
        DB::table('properties')->insert($data);
    }
}
