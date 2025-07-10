<?php

use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    //  user dashboard
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    //user profile
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
});

Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');

/** Product route */
Route::get('products', [ProductController::class, 'productsIndex'])->name('products.index');
Route::get('product-detail/{slug}', [ProductController::class, 'showProduct'])->name('product-detail');
Route::get('change-product-list-view', [ProductController::class, 'chageListView'])->name('change-product-list-view');

