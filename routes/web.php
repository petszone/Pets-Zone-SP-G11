<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Common\AdvertisementController as CommonAdvertisementController;
use App\Http\Controllers\Common\AnnouncementController;
use App\Http\Controllers\Common\HomeController;
use App\Http\Controllers\Common\ProductController;
use App\Http\Controllers\Common\ShopController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\AdvertisementController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// ---------------- Common Pages (don't need auth) -----------------
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('prod/{id}', [ProductController::class, 'show'])->name('common.product.show');
Route::get('ads', [CommonAdvertisementController::class, 'index'])->name('ads.index');
Route::get('about', [HomeController::class, 'about'])->name('home.about');
Route::get('instructions', [HomeController::class, 'Instructions'])->name('home.instructions');
Route::get('appointment', [HomeController::class, 'appointmentForm'])->name('home.appointmentForm');
Route::post('appointment', [HomeController::class, 'storeAppointment'])->name('home.storeAppointment');
Route::get('/payments/verify/{payment?}',[CheckoutController::class,'payment_verify'])->name('payment-verify');
// ---------------- End Common Pages (don't need auth) -----------------


Route::group(['middleware' => 'auth'], function () {
    // --------------------Cart Routes--------------------------------------------
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('cart/{id}/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('cart/{id}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    // --------------------End Cart Routes--------------------------------------------

    // --------------------Checkout Routes--------------------------------------------
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::post('country/city', [CheckoutController::class, 'getCitiesByCountryId'])->name('country.city');
    // --------------------End Checkout Routes--------------------------------------------

    // --------------------Account Routes--------------------------------------------
    Route::get('account', [AccountController::class, 'index'])->name('account.index');
    Route::post('account/{id}/update', [AccountController::class, 'update'])->name('account.update');
    Route::get('account/order/{orderId}', [AccountController::class, 'orderDetails'])->name('account.order.details');
    // --------------------End Account Routes--------------------------------------------

    // --------------------Ads Routes--------------------------------------------
    Route::get('ads/create', [AdvertisementController::class, 'create'])->name('ads.create');
    Route::post('ads/store', [AdvertisementController::class, 'store'])->name('ads.store');
    Route::post('ads/{id}/update', [AdvertisementController::class, 'update'])->name('ads.update');
    Route::post('ads/{id}/destroy', [AdvertisementController::class, 'destroy'])->name('ads.destroy');
    // --------------------End Cart Routes--------------------------------------------

    // --------------------Announcement Routes--------------------------------------------
    Route::get('announcement/create', [AnnouncementController::class, 'create'])->name('announce.create');
    Route::post('announcement/store', [AnnouncementController::class, 'store'])->name('announce.store');
    // --------------------End Announcement Routes--------------------------------------------

    // --------------------Post Routes--------------------------------------------
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('posts/storepost', [PostController::class, 'storepost'])->name('posts.storepost');
    Route::post('posts/storecomment', [PostController::class, 'storecomment'])->name('posts.storecomment');
    Route::post('posts/{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
    // --------------------End Post Routes--------------------------------------------

    // --------------------Chat Routes--------------------------------------------
    Route::get('chats', [ChatController::class, 'index'])->name('chats.index');
    Route::get('chats/{doctorid}', [ChatController::class, 'show'])->name('chats.show');
    Route::post('chats/home', [ChatController::class, 'home'])->name('chats.home');
    Route::post('chats/store', [ChatController::class, 'store'])->name('chats.store');
    // --------------------End Chat Routes--------------------------------------------
});


