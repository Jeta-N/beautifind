<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('price_range')->insert([
            [
                'pr_name' => '< Rp. 100.000',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pr_name' => 'Rp. 100.000 - Rp. 150.000',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pr_name' => 'Rp. 151.000 - Rp. 250.000',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pr_name' => 'Rp. 251.000 - Rp. 350.000',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'pr_name' => '> Rp. 350.000',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
