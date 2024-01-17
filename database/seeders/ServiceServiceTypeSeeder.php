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
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 1,
                'st_id' => 2,
                'duration' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 1,
                'st_id' => 4,
                'duration' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 1,
                'st_id' => 5,
                'duration' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 2,
                'st_id' => 2,
                'duration' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 3,
                'st_id' => 1,
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 3,
                'st_id' => 4,
                'duration' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 3,
                'st_id' => 5,
                'duration' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 4,
                'st_id' => 1,
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 4,
                'st_id' => 5,
                'duration' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 5,
                'st_id' => 3,
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 5,
                'st_id' => 4,
                'duration' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 5,
                'st_id' => 5,
                'duration' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_id' => 6,
                'st_id' => 1,
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
