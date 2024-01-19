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
                'account_id' => 5,
                'service_id' => 1,
                'sa_name' => 'Admin Service Salon',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 6,
                'service_id' => 2,
                'sa_name' => 'Admin Service 2',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 7,
                'service_id' => 3,
                'sa_name' => 'Admin Service 3',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 8,
                'service_id' => 4,
                'sa_name' => 'Admin Service 4',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 9,
                'service_id' => 5,
                'sa_name' => 'Admin Service 5',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 10,
                'service_id' => 6,
                'sa_name' => 'Admin Service 6',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 11,
                'service_id' => 7,
                'sa_name' => 'Admin Service 7',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 12,
                'service_id' => 8,
                'sa_name' => 'Admin Service 8',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 13,
                'service_id' => 9,
                'sa_name' => 'Admin Service 9',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 14,
                'service_id' => 10,
                'sa_name' => 'Admin Service 10',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 15,
                'service_id' => 11,
                'sa_name' => 'Admin Service 11',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 16,
                'service_id' => 12,
                'sa_name' => 'Admin Service 12',
                'sa_image_path' => 'saprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);
    }
}
