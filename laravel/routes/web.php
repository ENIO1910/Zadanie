<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::put('/cars', [\App\Http\Controllers\CarController::class, 'assignCarToUser'])->name('cars.users.update');
Route::get('/checkUserCar/{userId}', [\App\Http\Controllers\Controller::class, 'showAccountPage']);
Route::get('/', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
Route::get('/cars', [\App\Http\Controllers\CarController::class, 'index']);

