<?php

namespace App\Providers;

use App\Models\City;
use App\Models\SecurityQuestion;
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
        view()->composer([
            'pages.home', 'pages.detail', 'pages.search', 'pages.profile', 'pages.forgot-password',
            'pages.aboutus', 'pages.faq', 'pages.review-form', 'pages.staff.salon-profile',
            'pages.staff.service-service-type', 'pages.staff.staff-profile', 'pages.staff.employee',
            'pages.admin.services'
        ], function ($view) {
            $serviceType = ServiceType::all();
            $city = City::all();
            $questions = SecurityQuestion::all();

            $sharedData = [
                'serviceTypes' => $serviceType,
                'cities' => $city,
                'questions' => $questions
            ];

            $view->with($sharedData);
        });
    }
}
