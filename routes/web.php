<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductivityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrafficController;
use App\Http\Controllers\UtilizationController;
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

Route::redirect('/', '/login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');    

    Route::prefix('dashboard')->group(function () {
        Route::resource('traffic', TrafficController::class);
        Route::resource('service-time', ServiceController::class);
        Route::resource('utilization', UtilizationController::class);
        Route::resource('productivity', ProductivityController::class);
    });
});