<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NutritionalStatusHistoryController;
use App\Http\Controllers\Api\PmtMonitorController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ReportController;
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

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');
});

Route::group([
    'middleware' => ['auth:sanctum'],
], function () {

    Route::group([ 'prefix' => 'user',], function () {
        Route::get('/profile', [AuthController::class, 'profile']);
    });

    Route::group([ 'prefix' => 'report' ], function () {
        Route::post('/', [ReportController::class, 'store']);
        Route::get('/', [ReportController::class, 'index']);
        Route::get('/{id}', [ReportController::class, 'show']);
        Route::put('/{id}', [ReportController::class, 'update']);
        Route::delete('/{id}', [ReportController::class, 'destroy']);
    });

    Route::group([ 'prefix' => 'profile' ], function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::get('/{id}', [ProfileController::class, 'show']);
        Route::put('/{id}', [ProfileController::class, 'update']);
    });

    Route::group([ 'prefix' => 'pmt-monitor' ], function () {
        Route::get('/', [PmtMonitorController::class, 'index']);
        Route::get('/{id}', [PmtMonitorController::class, 'show']);
        Route::post('/', [PmtMonitorController::class, 'store']);
    });

    Route::group([ 'prefix' => 'nutritional-status-history' ], function () {
        Route::get('/', [NutritionalStatusHistoryController::class, 'index']);
        Route::post('/', [NutritionalStatusHistoryController::class, 'store']);
    });
});


Route::get('/test', function () {
    $current_date_time = date('Y-m-d H:i:s');
    return $current_date_time;
});