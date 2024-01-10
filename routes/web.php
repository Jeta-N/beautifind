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
Route::get('/profile', [UserController::class, 'viewProfile']);
Route::get('/faqs', [FaqController::class, 'viewFaqs']);
Route::get('/portfolio', [PortfolioImageController::class, 'viewPortfolios']);
Route::get('/promotion', [PromotionController::class, 'viewPromotions']);
Route::get('/review', [ReviewController::class, 'viewReviews']);
Route::get('/services', [ServiceController::class, 'viewServicesList']);
Route::get('/service/{id}', [ServiceController::class, 'viewServicesDetails']);
Route::get('/logout', [AccountController::class, 'logout']);
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
Route::post('/change-password', [AccountController::class, 'changePassword']);

Route::get('/user-booking', [BookingController::class, 'viewUserBooking']);

Route::post('/edit-preferences', [UserController::class, 'editPreferences']);

Route::get('/review/{id}', [ReviewController::class, 'viewReviewForm']);
Route::post('/create-review/{id}', [ReviewController::class, 'createReview']);

Route::post('/cancel-book/{id}', [BookingController::class, 'cancelBooking']);

// Staff
Route::get('/staff-login', [AccountController::class, 'viewLoginStaff']);
Route::post('/staff-login', [AccountController::class, 'loginStaff']);

Route::get('/staff-dashboard', [EmployeeController::class, 'staffDashboard']);
Route::get('/staff-review', [ReviewController::class, 'staffReviews']);
Route::get('/staff-profile', [EmployeeController::class, 'staffProfile']);
Route::put('/edit-staff-profile', [EmployeeController::class, 'updateStaffProfile']);
Route::get('/logout-staff', [EmployeeController::class, 'logoutStaff']);


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

// Staff Manage Employee
Route::get('/staff-employee', [EmployeeController::class, 'staffEmployees']);

Route::put('/edit-role/{id}', [AccountController::class, 'updateRole']);
Route::put('/edit-service-type/{id}', [EmployeeController::class, 'updateServiceType']);
Route::delete('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee']);
Route::post('/create-employee', [EmployeeController::class, 'createEmployee']);
Route::get('/employee-profile/{id}', [EmployeeController::class, 'viewEmployeeProfile']);
Route::put('/edit-employee-password', [AccountController::class, 'changeEmployeePassword']);

// Staff Manage Employee Service Type
Route::get('/staff-employee-service-type', [EmployeeServiceTypeController::class, 'staffEmployeeServiceType']);
Route::post('/create-employee-service-type', [EmployeeServiceTypeController::class, 'createEmployeeServiceType']);
Route::delete('/delete-employee-service-type/{id}', [EmployeeServiceTypeController::class, 'deleteEmployeeServiceType']);

// Staff Booking
Route::get('/staff-booking', [BookingController::class, 'staffBooking']);
Route::put('/done-booking-employee/{booking_id}', [BookingController::class, 'updateBookingStatus']);
Route::put('/cancel-booking-employee/{booking_id}', [BookingController::class, 'updateBookingStatus']);

// Staff Booking Slot
Route::get('/staff-booking-slot', [BookingSlotController::class, 'staffBookingSlot']);
Route::put('/delete-booking-slot/{bs_id}', [BookingSlotController::class, 'deleteBookingSlot']);
Route::post('/create-booking-slot', [BookingSlotController::class, 'createBookingSlot']);

// Website Manager
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
