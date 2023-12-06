<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_service_type')->insert([
            [
                'user_id' => 1,
                'st_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'st_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'st_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
