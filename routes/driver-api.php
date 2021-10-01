<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverApi;

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
Route::group(['prefix' => 'driver', 'as' => 'driver.'], function () {
    Route::post('register', [DriverApi\RegisterController::class, 'index']);
    Route::post('otp', [DriverApi\OtpController::class, 'index']);
    Route::post('login', [DriverApi\LoginController::class, 'index']);

    Route::group(['middleware' => 'auth:driver'], function () {
        // sign in
        Route::get('profile', [DriverApi\ProfileController::class, 'index']);
        Route::put('profile', [DriverApi\ProfileController::class, 'update']);
        Route::get('rides', [DriverApi\RideController::class, 'index']);
        Route::get('rides/{id}', [DriverApi\RideController::class, 'show']);
        Route::post('vehicle_types/{vehicleType}', [DriverApi\DriverController::class, 'index']);
        Route::get('user_request', [DriverApi\UserRequestController::class, 'index']);
        Route::put('user_request/{id}/accept', [DriverApi\UserRequestController::class, 'accept']);
        Route::put('user_request/{id}/reject', [DriverApi\UserRequestController::class, 'reject']);
        Route::put('user_request/{id}/start', [DriverApi\UserRequestController::class, 'start']);
        Route::put('user_request/{id}/complete', [DriverApi\UserRequestController::class, 'complete']);
        Route::get('rating', [DriverApi\RatingController::class, 'index']);
    });
});


