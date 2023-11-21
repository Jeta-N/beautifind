<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingSlotController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
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
Route::get('/services', [ServiceController::class, 'viewServicesList']);
Route::get('/services/{id}', [ServiceController::class, 'viewServicesDetails']);
