<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($index = 1; $index <= 10; $index++) {
            // DB::table('news')->insert([
            //     'title' => 'Tin tức ' . $index,
            //     'content' => 'Nội dung tin tức ' . $index,
            //     'image' => 'image' . $index . '.jpg',
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            //     // ...
            // ]);
        }
    }
}
