<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_service_type')->insert([
            [
                'service_id' => 1,
                'st_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 1,
                'st_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 1,
                'st_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
