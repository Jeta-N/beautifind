<?php

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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/search', function () {
    return view('pages.search');
});

Route::get('/detail', function () {
    return view('pages.detail');
});


Route::get('/admin', function () {
    return view('pages.admin.dashboard');
});
