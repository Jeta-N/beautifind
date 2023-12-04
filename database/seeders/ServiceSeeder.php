<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service')->insert([
            [
                'service_name' => 'Service Salon', //female hair cut, pedicure, nail art
                'service_description' => 'This salon provides services for female and male haircut and nail art.',
                'service_opening_hours' => 'Monday - Sunday 10 AM - 9 PM',
                'service_address' => 'Jl. Karang Tengah Raya No. 13, Lebak Bulus, Jakarta Selatan',
                'city_id' => 1,
                'service_phone' => '085722937746',
                'service_email' => 'service.salon@gmail.com',
                'service_instagram' => 'service.salon.jakarta',
                'service_image_path' => 'salonprofile.jpg',
                'service_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_name' => 'Service Barber', //male haircut aja
                'service_description' => 'This salon provides services for female and male haircut and nail art.',
                'service_opening_hours' => 'Monday - Sunday 10 AM - 9 PM',
                'service_address' => 'Jl. Karang Tengah Raya No. 13, Lebak Bulus, Jakarta Selatan',
                'city_id' => 1,
                'service_phone' => '085722937746',
                'service_email' => 'service.salon@gmail.com',
                'service_instagram' => 'service.salon.jakarta',
                'service_image_path' => 'salonprofile.jpg',
                'service_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_name' => 'Service Salon 2', //female hair cut, pedicure, nail art
                'service_description' => 'This salon provides services for female and male haircut and nail art.',
                'service_opening_hours' => 'Monday - Sunday 10 AM - 9 PM',
                'service_address' => 'Jl. Karang Tengah Raya No. 13, Lebak Bulus, Jakarta Selatan',
                'city_id' => 1,
                'service_phone' => '085722937746',
                'service_email' => 'service.salon@gmail.com',
                'service_instagram' => 'service.salon.jakarta',
                'service_image_path' => 'salonprofile.jpg',
                'service_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_name' => 'Service Salon 3', //female hair cut, nail art
                'service_description' => 'This salon provides services for female and male haircut and nail art.',
                'service_opening_hours' => 'Monday - Sunday 10 AM - 9 PM',
                'service_address' => 'Jl. Karang Tengah Raya No. 13, Lebak Bulus, Jakarta Selatan',
                'city_id' => 1,
                'service_phone' => '085722937746',
                'service_email' => 'service.salon@gmail.com',
                'service_instagram' => 'service.salon.jakarta',
                'service_image_path' => 'salonprofile.jpg',
                'service_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_name' => 'Nail Salon', //pedicure, nail art
                'service_description' => 'This salon provides services for female and male haircut and nail art.',
                'service_opening_hours' => 'Monday - Sunday 10 AM - 9 PM',
                'service_address' => 'Jl. Karang Tengah Raya No. 13, Lebak Bulus, Jakarta Selatan',
                'city_id' => 1,
                'service_phone' => '085722937746',
                'service_email' => 'service.salon@gmail.com',
                'service_instagram' => 'service.salon.jakarta',
                'service_image_path' => 'salonprofile.jpg',
                'service_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'service_name' => 'Service Salon 4', //female hair cut
                'service_description' => 'This salon provides services for female and male haircut and nail art.',
                'service_opening_hours' => 'Monday - Sunday 10 AM - 9 PM',
                'service_address' => 'Jl. Karang Tengah Raya No. 13, Lebak Bulus, Jakarta Selatan',
                'city_id' => 1,
                'service_phone' => '085722937746',
                'service_email' => 'service.salon@gmail.com',
                'service_instagram' => 'service.salon.jakarta',
                'service_image_path' => 'salonprofile.jpg',
                'service_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
