<?php

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
use App\Models\Service;
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
Route::get('/user-profile', [UserController::class, 'viewUserProfile']);
Route::get('/faqs', [FaqController::class, 'viewFaqs']);
Route::get('/portfolio', [PortfolioImageController::class, 'viewPortfolios']);
Route::get('/promotion', [PromotionController::class, 'viewPromotions']);
Route::get('/review', [ReviewController::class, 'viewReviews']);
Route::get('/services', [ServiceController::class, 'viewServicesList']);
Route::get('/services/{id}', [ServiceController::class, 'viewServicesDetails']);

// Route::get('/', function () {
//     return view('pages.home');
// });

// Route::get('/search', function () {
//     return view('pages.search');
// });

// Route::get('/detail', function () {
//     return view('pages.detail');
// });


// Route::get('/admin', function () {
//     return view('pages.admin.dashboard');
// });
