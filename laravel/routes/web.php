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

Route::get('/order/add', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
Route::post('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');

Route::get('/worker/add', [\App\Http\Controllers\WorkerController::class, 'add'])->name('worker.add');
Route::post('/worker/create', [\App\Http\Controllers\WorkerController::class, 'create'])->name('worker.create');

Route::get('/customer/add', [\App\Http\Controllers\CustomerController::class, 'add'])->name('customer.add');
Route::post('/customer/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');

Route::get('/users/add', [\App\Http\Controllers\UserController::class, 'show'])->name('users.add');
Route::post('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::put('/cars', [\App\Http\Controllers\CarController::class, 'assignCarToUser'])->name('cars.users.update');
Route::get('/cars/add', [\App\Http\Controllers\CarController::class, 'show'])->name('cars.add');
Route::post('/cars/create', [\App\Http\Controllers\CarController::class, 'create'])->name('cars.create');
Route::get('/checkUserCar', [\App\Http\Controllers\Controller::class, 'showAccountPage'])->name('cars.users.check');
Route::get('/', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customer.show');
Route::get('/cars', [\App\Http\Controllers\CarController::class, 'index'])->name('cars.index');

