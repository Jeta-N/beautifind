<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingSlotController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ServiceController::class, 'viewHomepage']);
Route::get('/booking', [BookingController::class, 'viewBooking']);
Route::get('/bookingslot', [BookingSlotController::class, 'viewBookingSlots']);
Route::get('/employees', [EmployeeController::class, 'viewEmployees']);
Route::get('/emp-profile', [EmployeeController::class, 'viewEmployeeProfile']);
Route::get('/admins', [SuperAdminController::class, 'viewSuperAdmins']);
Route::get('/sa-profile', [SuperAdminController::class, 'viewSuperAdminProfile']);
Route::get('/users', [UserController::class, 'viewUsers']);
Route::get('/profile', [UserController::class, 'viewUserProfile']);
Route::get('/faqs', [FaqController::class, 'viewFaqs']);
Route::get('/portfolio', [PortfolioImageController::class, 'viewPortfolios']);
Route::get('/promotion', [PromotionController::class, 'viewPromotions']);
Route::get('/review', [ReviewController::class, 'viewReviews']);
Route::get('/services', [ServiceController::class, 'viewServicesList']);
Route::get('/service/{id}', [ServiceController::class, 'viewServicesDetails']);
Route::get('/logout', [AccountController::class, 'logout']);
Route::get('/admin-dashboard', [AccountController::class, 'viewDashboard']);

Route::post('/login', [AccountController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/detail', function () {
    return view('pages.detail');
});

Route::get('/about', function () {
    return view('pages.aboutus');
});

Route::get('/faq', function () {
    return view('pages.faq');
});

Route::post('/get-time-slots', [BookingSlotController::class, 'getBookingSlots']);
Route::post('/book/{id}', [BookingController::class, 'createBooking']);

Route::post('/edit-profile', [UserController::class, 'editProfile']);
Route::post('/change-password', [UserController::class, 'changePassword']);

Route::get('/user-booking', [BookingController::class, 'viewUserBooking']);

Route::post('/edit-preferences', [UserController::class, 'editPreferences']);

Route::get('/review/{id}', [ReviewController::class, 'viewReviewForm']);
Route::post('/create-review/{id}', [ReviewController::class, 'createReview']);

Route::post('/cancel-book/{id}', [BookingController::class, 'cancelBooking']);
