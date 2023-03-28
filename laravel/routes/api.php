<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/customer/list', [\App\Http\Controllers\CustomerController::class, 'list'])->name('customer.list');
Route::get('/customer/{customer_id}', [\App\Http\Controllers\CustomerController::class, 'detailsAPI']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
