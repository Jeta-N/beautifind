<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AccountSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            ServiceTypeSeeder::class,
            ServiceSeeder::class,
            EmployeeSeeder::class,
            SuperAdminSeeder::class,
            SecurityQuestionSeeder::class,
            BookingSlotSeeder::class,
            BookingSeeder::class,
            ReviewSeeder::class,
            EmployeeServiceTypeSeeder::class,
            ServiceServiceTypeSeeder::class,
            PromotionSeeder::class,
            FaqSeeder::class,
            PortfolioImageSeeder::class,
            UserServiceTypeSeeder::class,
        ]);
    }
}
