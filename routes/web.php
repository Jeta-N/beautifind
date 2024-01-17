<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingSlotController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeServiceTypeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceServiceTypeController;
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


// Static Page
Route::get('/about', function () {
    return view('pages.aboutus');
});
Route::get('/faq', function () {
    return view('pages.faq');
});

// Forgot Password
Route::get('/forgot-password', [AccountController::class, 'viewForgotPassword']);
Route::post('/check-email', [AccountController::class, 'checkEmail']);
Route::post('/check-answer', [AccountController::class, 'checkAnswer']);
Route::put('/edit-password', [AccountController::class, 'editPassword']);

// Service List
Route::get('/services', [ServiceController::class, 'viewServicesList']);

// Service Detail
Route::get('/service/{id}', [ServiceController::class, 'viewServicesDetails']);



// Guest
Route::middleware(['isGuest'])->group(function () {
    // Login / Register
    Route::post('/login', [AccountController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);

    // Home Page
    Route::get('/', [ServiceController::class, 'viewHomepage']);

    //Login Staff, Manager & Admin
    Route::get('/staff-login', [AccountController::class, 'viewLoginStaff']);
    Route::post('/staff-login', [AccountController::class, 'loginStaff']);
});

// User
Route::middleware(['isUser'])->group(function () {
    // Service Detail - Book
    Route::post('/get-time-slots', [BookingSlotController::class, 'showAvailableSlots']);
    Route::post('/book/{id}', [BookingController::class, 'createBooking']);

    // User Profile - My Profile
    Route::get('/profile', [UserController::class, 'viewProfile']);
    Route::put('/edit-profile', [UserController::class, 'editProfile']);
    Route::put('/change-password', [AccountController::class, 'changePassword']);
    // User Profile - My Order
    Route::get('/user-booking', [BookingController::class, 'viewUserBooking']);
    Route::post('/cancel-book/{id}', [BookingController::class, 'cancelBooking']);
    // User Profile - My Preferences
    Route::post('/edit-preferences', [UserController::class, 'editPreferences']);

    // Review
    Route::get('/review/{id}', [ReviewController::class, 'viewReviewForm']);
    Route::post('/create-review/{id}', [ReviewController::class, 'createReview']);

    // Logout
    Route::get('/logout', [AccountController::class, 'logout']);
});

// Staff
Route::middleware(['isStaff'])->group(function () {
    // Staff Booking
    Route::get('/staff-booking', [BookingController::class, 'staffBooking']);
    Route::put('/done-booking-employee/{booking_id}', [BookingController::class, 'updateBookingStatus']);
    Route::put('/cancel-booking-employee/{booking_id}', [BookingController::class, 'updateBookingStatus']);

    Route::put('/edit-staff-profile', [EmployeeController::class, 'updateStaffProfile']);
    Route::get('/staff-profile', [EmployeeController::class, 'staffProfile']);
    Route::get('/logout-staff', [EmployeeController::class, 'logoutStaff']);
    Route::get('/staff-review', [ReviewController::class, 'staffReviews']);
});

// Manager
Route::middleware(['isManager'])->group(function () {
    Route::get('/staff-dashboard', [EmployeeController::class, 'staffDashboard']);

    // Staff Salon Profile
    Route::get('/staff-salon-profile', [ServiceController::class, 'staffService']);

    Route::put('/activate-service', [ServiceController::class, 'activateService']);
    Route::put('/deactivate-service', [ServiceController::class, 'deactivateService']);

    Route::put('/activate-portfolio', [PortfolioImageController::class, 'activatePortfolio']);
    Route::put('/deactivate-portfolio', [PortfolioImageController::class, 'deactivatePortfolio']);
    Route::delete('/delete-portfolio/{id}', [PortfolioImageController::class, 'deletePortfolio']);
    Route::post('/add-portfolio', [PortfolioImageController::class, 'createPortfolio']);

    Route::put('/activate-promo', [PromotionController::class, 'activatePromotion']);
    Route::put('/deactivate-promo', [PromotionController::class, 'deactivatePromotion']);
    Route::delete('/delete-promo/{id}', [PromotionController::class, 'deletePromotion']);
    Route::post('/add-promotion', [PromotionController::class, 'createPromotion']);

    Route::put('/activate-faq', [FaqController::class, 'activateFAQ']);
    Route::put('/deactivate-faq', [FaqController::class, 'deactivateFAQ']);
    Route::delete('/delete-faq/{id}', [FaqController::class, 'deleteFAQ']);
    Route::post('/add-faq', [FaqController::class, 'createFAQ']);

    Route::put('/edit-service-profile', [ServiceController::class, 'updateServiceProfile']);

    // Staff Service Service Type
    Route::get('/staff-service-service-type', [ServiceServiceTypeController::class, 'staffServiceServiceType']);
    Route::post('/create-service-service-type', [ServiceServiceTypeController::class, 'createServiceServiceType']);
    Route::delete('/delete-service-service-type/{id}', [ServiceServiceTypeController::class, 'deleteServiceServiceType']);

    // Staff Manage Employee
    Route::get('/staff-employee', [EmployeeController::class, 'staffEmployees']);
    Route::put('/edit-service-type/{id}', [EmployeeController::class, 'updateServiceType']);

    Route::get('/employee-profile/{id}', [EmployeeController::class, 'viewEmployeeProfile']);
    Route::put('/edit-employee-password', [AccountController::class, 'changeEmployeePassword']);

    Route::delete('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee']);
    Route::post('/create-employee', [EmployeeController::class, 'createEmployee']);

    // Staff Manage Employee Service Type
    Route::get('/staff-employee-service-type', [EmployeeServiceTypeController::class, 'staffEmployeeServiceType']);
    Route::post('/create-employee-service-type', [EmployeeServiceTypeController::class, 'createEmployeeServiceType']);
    Route::delete('/delete-employee-service-type/{id}', [EmployeeServiceTypeController::class, 'deleteEmployeeServiceType']);

    // Staff Booking Slot
    Route::get('/staff-booking-slot', [BookingSlotController::class, 'staffBookingSlot']);
    Route::put('/delete-booking-slot/{bs_id}', [BookingSlotController::class, 'deleteBookingSlot']);
    Route::post('/create-booking-slot', [BookingSlotController::class, 'createBookingSlot']);
});

// Super Admin
Route::middleware(['isAdmin'])->group(function () {
    // Admin Manage Employee
    Route::put('/edit-role/{id}', [AccountController::class, 'updateRole']);
});

// Website Manager
Route::middleware(['isWebsiteManager'])->group(function () {
    Route::get('/admin-dashboard', [AccountController::class, 'adminDashboard']);

    // WM Users
    Route::get('/admin-users', [UserController::class, 'adminUsers']);
    Route::put('/edit-user-password', [AccountController::class, 'changeUserPassword']);
    Route::put('/block-user/{id}', [AccountController::class, 'blockAccount']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);
    Route::get('/user-profile/{id}', [UserController::class, 'viewUserProfile']);

    // WM Employee
    Route::get('/admin-employees', [EmployeeController::class, 'adminEmployees']);
    Route::get('/admin-employee-profile/{id}', [EmployeeController::class, 'viewEmployeeProfile']);
    Route::put('/edit-super-admin-password', [AccountController::class, 'changeSuperAdminPassword']);

    // WM Services
    Route::get('/admin-services', [ServiceController::class, 'adminServices']);
    Route::get('/admin-service-profile/{id}', [ServiceController::class, 'viewServiceProfile']);
    Route::post('/create-service', [SuperAdminController::class, 'createSuperAdmin']);
    Route::delete('/delete-service/{id}', [ServiceController::class, 'deleteService']);

    // WM Reviews
    Route::get('/admin-reviews', [ReviewController::class, 'adminReviews']);
});
