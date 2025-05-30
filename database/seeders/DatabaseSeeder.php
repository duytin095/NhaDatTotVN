<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1000000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminTableSeeder::class,
            TypeTableSeeder::class,
            StatusTableSeeder::class,
            ConstructionTableSeeder::class,
            UserTableSeeder::class,
            PropertyTableSeeder::class,
            NewsTypeTableSeeder::class,
            NewsTableSeeder::class,
        ]);
    }
}
