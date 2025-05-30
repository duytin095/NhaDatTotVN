<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
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

        $description = '
        Nhiều nhà đầu tư lựa chọn "đánh bắt xa bờ", tức là đầu tư sản phẩm bất động sản tại các tỉnh, thành khác, thậm chí quốc gia khác để đa dạng hóa danh mục đầu tư. Theo Entrepreneur, nhà đầu tư cần lưu ý một số điều trước khi xuống tiền đầu tư theo cách này.
Bán đẩt 5500m2 đất sào thổ cư đất tại Xã Vĩnh Thanh, Huyện Nhơn Trạch, Đồng Nai.
BÁN KÍNH 1KM QUAY ĐẦU ĐẦY ĐỦ TIỆN ÍCH.
- Sát Cảng Vùng 2 Hải Quân Nhân Dân Việt Nam.
- Xung Quanh là KCN, TT UBND xã, Trường, Chợ,.....
- Cách DT769 thông thương HL13 kết nối các khu và tiện ích, khu CN lân cận.
- DT: 65x95m (khoảng 5500m². toàn bộ diện tích đã chuyển đổi Thổ Cư).
- Đường nhựa thông thương trục chính 12m
- Tổng 05 sổ Hồng cá nhân.
- Tại X.Vĩnh Thanh, Nhơn Trạch. Đồng Nai.
- Pháp lý : công chứng ngay
- Giá bán : 50 tỷ. (Giá cũ là 60 tỷ)
- Kính chào quý nhà đầu tư tham quan và sở hữu bất động sản pháp lý và vị trí siêu đầu tư trong năm 2024.
- Quý nhà đầu tư cần thêm thông tin chi tiết xin vui lòng liên hệ em.
Xin càm ơn!        ';
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $numImages = rand(1, count($images));
            $randomImages = array_slice($images, rand(0, count($images) - $numImages), $numImages);
            $watermarkedImages = [];
            foreach ($randomImages as $image) {
                $imagePath = public_path($image);
                $imageInstance = Image::make($imagePath);
                $watermark = Image::make(public_path('assets/user/images/nhadattotvn_logo_light.png'));

                // Calculate the scale factor
                $scaleFactor = min($imageInstance->width() / $watermark->width(), $imageInstance->height() / $watermark->height()) * 0.2; // adjust the 0.2 value to control the watermark size

                // Resize the watermark
                $watermark->resize($watermark->width() * $scaleFactor, $watermark->height() * $scaleFactor);

                $imageInstance->insert($watermark, 'center', 10, 10);

                if (!file_exists(public_path('temp'))) {
                    mkdir(public_path('temp'), 0777, true);
                }
                // Store the watermarked image in a temporary location
                $imageName = time() . '_' . basename($image);
                $imageInstance->save(public_path('temp/' . $imageName));
                // Add the watermarked image to the array
                $watermarkedImages[] = 'temp/' . $imageName;
            }

            $propertyVideoType = rand(0, count($videoLinks) - 1); // Generate a random video type
            $data[] = [
                'property_type_id' => rand(1, 20),
                'property_name' => 'Bán đẩt 5500m2 đất sào thổ cư đất tại Xã Vĩnh Thanh, Huyện Nhơn Trạch, Đồng Nai Giá: 50 tỷ.',

                'property_description' => $description,
                // 'property_image' => json_encode($randomImages),
                'property_image' => json_encode($watermarkedImages),
                'property_video_type' => $propertyVideoType,
                'property_video_link' => $videoLinks[$propertyVideoType],
                // default address
                'property_address' => '53 An Hoi, Chuong My, Thị trấn Chúc Sơn, Ha Noi',
                'property_address_number' => '53',
                'property_street' => 'An Hoi',
                'property_ward' => 10015, //"Thị trấn Chúc Sơn"
                'property_district' => 277, // "Chuong My"
                'property_province' => 1, // Ha Noi
                'property_price' => rand(0, 10000000),

                'property_status' => rand(0, 1),
                'property_legal' => 0,
                'property_direction' => rand(0, 3),
                'property_facade' => rand(0, 500),
                'property_depth' => rand(0, 500),
                'property_acreage' => rand(0, 500),
                'property_floor' => rand(1, 5),
                'property_bedroom' => rand(0, 10),
                'property_bathroom' => rand(0, 10),
                'property_entry' => rand(0, 500),


                'property_seller_id' => rand(1, 10),
                'property_label' => rand(0, 4),
                'slug' => 'property-' . ($i + 1),
                'property_views' => rand(0, 1000),

                'created_at' => Carbon::now()->addHours(3),
                'updated_at' => Carbon::now()->addHours(3),
            ];
        }
        DB::table('properties')->insert($data);
    }
}
