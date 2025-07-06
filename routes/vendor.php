<?php

use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register vendor routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Vendor" middleware group. Make something great!
|
*/

/** vendor dashboard **/
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
