<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('super_admin')->insert([
            [
                'account_id' => 2,
                'service_id' => 1,
                'sa_name' => 'Admin Service Salon',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
