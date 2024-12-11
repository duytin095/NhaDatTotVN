<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($index = 1; $index <= 10; $index++) {
            DB::table('users')->insert([
                'user_name' => 'User ' . $index,
                'user_phone' => '012345678' . $index,
                'email' => 'user' . $index . '@gmail.com',
                'owner_referral_code' => 'NDT' . $index,
                'active_flg' => '0',
                'delete_flg' => '0',
                'slug' => 'user-' . $index, 
                'password' => bcrypt('1234'), // Use bcrypt to hash the password
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // ...
            ]);
        }
    }
}
