<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('customer', Admin\UserController::class);
    Route::put('customer/updatePassword/{customer}', [Admin\UserController::class, 'updatePassword'])->name('customer.update.password');

    Route::resource('vendor', Admin\VendorController::class);
    Route::put('vendor/updatePassword/{vendor}', [Admin\VendorController::class, 'updatePassword'])->name('vendor.update.password');
    Route::post('vendor/credit/{vendor}', [Admin\VendorController::class, 'addCredit'])->name('vendor.add.credit');
    Route::post('vendor/penalty/{vendor}', [Admin\VendorController::class, 'addPenalty'])->name('vendor.add.penalty');
    Route::post('vendor/bonus/{vendor}', [Admin\VendorController::class, 'addBonus'])->name('vendor.add.bonus');

    Route::resource('sub_admin', Admin\SubAdminController::class);
    Route::put('sub_admin/updatePassword/{sub_admin}', [Admin\SubAdminController::class, 'updatePassword'])->name('sub_admin.update.password');

    Route::resource('driver', Admin\DriverController::class);
    Route::put('driver/updatePassword/{driver}', [Admin\DriverController::class, 'updatePassword'])->name('driver.update.password');

    Route::resource('role', Admin\RoleController::class);
    Route::resource('vehicle_type', Admin\VehicleTypeController::class);
    Route::resource('vehicle_category', Admin\VehicleCategoryController::class);
    Route::resource('vehicle', Admin\VehicleController::class);

    Route::group(['as' => 'driver.vehicle.images.', 'prefix' => 'driver_vehicle_images'], function () {
        Route::get('/{vehicle}', [Admin\VehicleImageController::class, 'index'])->name('index');
        Route::post('/{vehicle}', [Admin\VehicleImageController::class, 'store'])->name('store');
        Route::delete('/{vehicleImage}', [Admin\VehicleImageController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'user.request.', 'prefix' => 'user_request'], function () {
        Route::get('/', [Admin\UserRequestController::class, 'index'])->name('index');
        Route::get('/complete', [Admin\UserRequestController::class, 'complete'])->name('complete');
        Route::get('/canceled', [Admin\UserRequestController::class, 'canceled'])->name('canceled');
        Route::get('/pending', [Admin\UserRequestController::class, 'pending'])->name('pending');
        Route::get('/{userRequest}', [Admin\UserRequestController::class, 'show'])->name('show');
    });

    Route::get('setting/create', [Admin\SettingController::class, 'create'])->name('setting.create');
    Route::post('setting', [Admin\SettingController::class, 'store'])->name('setting');
});
