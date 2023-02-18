<?php

use App\Http\Controllers\Admin\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// --------------------Porduct Routes--------------------------------------------
// Route::get('/products', [ProductController::class, 'index'])->name('product.index');
// Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
// Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
// Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
// Route::post('/product/{id}/update', [ProductController::class, 'store'])->name('product.update');
// Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
// Route::post('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
// Route::post('/product/media/add-more', [ProductController::class, 'addMoreMedia'])->name('product.media.add');
// --------------------End Porduct Routes-----------------------------------------
