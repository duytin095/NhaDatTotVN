<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 4; $i++) {
            $data = [
                'name' => 'Pricing Plan ' . $i,
                'price' => $i * 100,
            ];
            \App\Models\PricingPlan::create([
                'name' => $data['name'],
                'price' => $data['price'],
            ]);
        }
    }
}
