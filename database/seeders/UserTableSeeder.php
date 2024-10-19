<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'user_name' => 'Phuong Ly',
            'user_phone' => '0123456789',
            'active_flg' => '0',
            'delete_flg' => '0', 
            'password' => bcrypt('1234'), // Use bcrypt to hash the password
            // ...
        ]);
    }
}
