<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EmployeeServiceType;
use App\Models\PriceRange;
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
            BookingSeeder::class,
            BookingSlotSeeder::class,
            EmployeeSeeder::class,
            EmployeeServiceTypeSeeder::class,
            FaqSeeder::class,
            PortfolioImageSeeder::class,
            PriceRangeSeeder::class,
            PromotionSeeder::class,
            ReviewSeeder::class,
            SecurityQuestionSeeder::class,
            ServiceSeeder::class,
            ServicePriceRangeSeeder::class,
            ServiceServiceTypeSeeder::class,
            ServiceTypeSeeder::class,
            UserSeeder::class,
            SuperAdminSeeder::class,
        ]);
    }
}
