<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicePriceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_price_range')->insert([
            [
                'service_id' => 1,
                'pr_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 1,
                'pr_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 2,
                'pr_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 3,
                'pr_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 5,
                'pr_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 6,
                'pr_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 3,
                'pr_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 2,
                'pr_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 4,
                'pr_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
