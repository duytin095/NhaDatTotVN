<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            'admin_name' => 'Admin',
            'admin_phone' => '0998688857',
            'admin_email' => 'admin@gmail.com',
            'password' => bcrypt('admin'), // Use bcrypt to hash the password
            // ...
        ]);
    }
}
