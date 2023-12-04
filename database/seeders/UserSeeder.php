<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'account_id' => 1,
                'user_name' => 'Lisa',
                'user_gender' => 'Female',
                'user_birthdate' => '2003-10-30',
                'user_phone_number' => '081722464457',
                'city_id' => 1,
                'user_image_path' => 'userprofile.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
