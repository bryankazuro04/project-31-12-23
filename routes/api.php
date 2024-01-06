<?php

use App\Models\Productivity;
use App\Models\Service;
use App\Models\Traffic;
use App\Models\Utilization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/traffic-data', function() {
    $trafficData = Traffic::all();
    return response()->json($trafficData);
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function() {

    Route::get('/service-data', function() {
        $serviceData = Service::all();
        return response()->json($serviceData);
    });

    Route::get('/utilization-data', function() {
        $utilizationData = Utilization::all();
        return response()->json($utilizationData);
    });

    Route::get('/productivity-data', function() {
        $productivityData = Productivity::all();
        return response()->json($productivityData);
    });
});