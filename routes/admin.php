<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\EmployeeLoginController;
use App\Http\Controllers\Common\AdvertisementController as CommonAdvertisementController;
use App\Http\Controllers\Common\HomeController;
use App\Http\Controllers\Common\ProductController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\AdvertisementController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::get('adm/login',   [AdminLoginController::class, 'showLoginForm'])->name('adm.login.get');
    Route::post('adm/login',  [AdminLoginController::class, 'login'])->name('adm.login.post');
    Route::get('employee/login',   [EmployeeLoginController::class, 'showLoginForm'])->name('adm.employee.login.get');
    Route::post('employee/login',  [EmployeeLoginController::class, 'login'])->name('adm.employee.login.post');
});


Route::group(['middleware' => ['admin'], 'prefix' => 'adm', 'as' => 'adm.'], function(){  //'middleware' => 'auth:admin'
    // --------------------Porduct Routes--------------------------------------------
    Route::get('products', [AdminProductController::class, 'index'])->name('product.index');
    Route::get('product/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [AdminProductController::class, 'store'])->name('product.store');
    Route::get('product/{id}/edit', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::post('product/{id}/update', [AdminProductController::class, 'update'])->name('product.update');
    Route::get('product/{id}', [AdminProductController::class, 'show'])->name('product.show');
    Route::post('product/{id}/destroy', [AdminProductController::class, 'destroy'])->name('product.destroy');
    Route::post('product/media/add-more', [AdminProductController::class, 'addMoreMedia'])->name('product.media.add');
    // --------------------End Porduct Routes-----------------------------------------

    // --------------------Order Routes--------------------------------------------
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/{id}', [OrderController::class, 'show'])->name('order.show');
    // --------------------End Order Routes-----------------------------------------

    // --------------------Announce Routes--------------------------------------------
    Route::get('announces', [AnnouncementController::class, 'index'])->name('announces.index');
    Route::get('announces/{id}', [AnnouncementController::class, 'show'])->name('announces.show');
    Route::post('announces/{id}/destroy', [AnnouncementController::class, 'destroy'])->name('announces.destroy');
    // --------------------End Announce Routes-----------------------------------------

    // --------------------Appointment Routes--------------------------------------------
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::post('appointments/{id}/update', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::get('appointments/{id}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::post('appointments/{id}/destroy', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::post('appointments/{id}/change_status', [AppointmentController::class, 'changeStatus'])->name('appointments.change_status');
    // --------------------End Appointment Routes-----------------------------------------

    // --------------------Chat Routes--------------------------------------------
    Route::get('chats', [ChatController::class, 'index'])->name('chats.index');
    Route::get('chats/{userid}', [ChatController::class, 'show'])->name('chats.show');
    Route::post('chats/addNew', [ChatController::class, 'addNew'])->name('chats.addNew');
    Route::post('chats/update', [ChatController::class, 'update'])->name('chats.update');
    Route::post('chats/change_status', [ChatController::class, 'changeStatus'])->name('chats.change_status');
    // --------------------End Chat Routes-----------------------------------------

    // --------------------Role Routes--------------------------------------------
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('roles/{id}/update', [RoleController::class, 'update'])->name('roles.update');
    Route::post('roles/{id}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
    // --------------------End Role Routes-----------------------------------------

    // --------------------Employee Routes--------------------------------------------
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('employees/{id}/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::post('employees/{id}/destroy', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    // --------------------End Employee Routes-----------------------------------------

});