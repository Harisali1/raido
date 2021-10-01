<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerApi;

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


Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
    Route::post('register', [CustomerApi\RegisterController::class, 'index']);
    Route::post('otp', [CustomerApi\OtpController::class, 'index']);
    Route::post('login', [CustomerApi\LoginController::class, 'index']);

    Route::group(['middleware' => 'auth:api'], function () {
        // sign in
        Route::get('profile', [CustomerApi\ProfileController::class, 'index']);
        Route::put('profile', [CustomerApi\ProfileController::class, 'update']);
        Route::get('vehicle_types', [CustomerApi\VehicleTypeController::class, 'index']);
        Route::post('vehicle_types/{vehicleType}', [CustomerApi\DriverController::class, 'index']);
        Route::post('user_request', [CustomerApi\UserRequestController::class, 'index']);
        Route::get('rides', [CustomerApi\RideController::class, 'index']);
        Route::get('rides/{id}', [CustomerApi\RideController::class, 'show']);
        Route::put('user_request/{id}/cancel', [CustomerApi\UserRequestController::class, 'update']);
        Route::post('rating', [CustomerApi\RatingController::class, 'index']);
        Route::post('location', [CustomerApi\LocationController::class, 'index']);
    });
});
