<?php

use App\Http\Controllers\Vendor;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'middleware' => 'vendor'], function () {
    Route::get('/dashboard', [Vendor\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [Vendor\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [Vendor\ProfileController::class, 'store'])->name('profile.store');
    Route::post('/change_password', [Vendor\ProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/vehicle_type', [Vendor\VehicleTypeController::class, 'store'])->name('vehicle_type.store');
    Route::post('/change_vehicle', [Vendor\ChangeVehicleController::class, 'store'])->name('change_vehicle.store');


    Route::resource('driver', Vendor\DriverController::class);
    Route::group(['as' => 'driver.', 'prefix' => 'driver'], function () {
        route::put('/update_password/{driver}', [vendor\drivercontroller::class, 'updatePassword'])->name('update.password');
        route::put('/update_profile/{driver}', [vendor\drivercontroller::class, 'updateProfile'])->name('update.profile');
    });

    Route::group(['as' => 'driver.vehicle.images.', 'prefix' => 'driver_vehicle_images'], function () {
        Route::get('/{vehicle}', [vendor\VehicleImageController::class, 'index'])->name('index');
        Route::post('/{vehicle}', [vendor\VehicleImageController::class, 'store'])->name('store');
        Route::delete('/{vehicleImage}', [vendor\VehicleImageController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'base.fare.calculation.', 'prefix' => 'base_fare_calculation'], function () {
        Route::get('/', [Vendor\SettingController::class, 'index'])->name('index');
        Route::get('/{vehicle_type}', [Vendor\SettingController::class, 'create'])->name('create');
        Route::post('/', [Vendor\SettingController::class, 'store'])->name('store');
        Route::get('/{vendor_base_fare}/edit', [Vendor\SettingController::class, 'edit'])->name('edit');
        Route::put('/{vendor_base_fare}', [Vendor\SettingController::class, 'update'])->name('update');
    });

    Route::get('/user_request', [Vendor\UserRequestController::class, 'index'])->name('user.request.index');
    Route::get('/user_request/{userRequest}', [Vendor\UserRequestController::class, 'show'])->name('user.request.show');
    Route::get('/user_request/{userRequest}/approved', [Vendor\UserRequestController::class, 'approved'])->name('user.request.approved');
    Route::get('/user_request/{userRequest}/rejected', [Vendor\UserRequestController::class, 'rejected'])->name('user.request.rejected');
});
