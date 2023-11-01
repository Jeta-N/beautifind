<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('portfolio_image')->insert([
            [
                'service_id' => 1,
                'image_path' => 'portfolioimage.jpg',
                'portfolio_title' => 'Layered Hairstyle',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
