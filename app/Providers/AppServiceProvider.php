<?php

namespace App\Providers;

use App\Models\City;
use App\Models\ServiceType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->composer(['pages.home', 'pages.detail', 'pages.search', 'pages.profile', 'pages.aboutus', 'pages.faq', 'pages.review-form'], function ($view) {
            $serviceType = ServiceType::all();
            $city = City::all();
            $sharedData = [
                'serviceTypes' => $serviceType,
                'cities' => $city
            ];

            $view->with($sharedData);
        });
    }
}
