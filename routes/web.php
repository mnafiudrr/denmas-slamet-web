<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NutritionalStatusHistoryController;
use App\Http\Controllers\PmtMonitorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResultConfigController;
use App\Http\Controllers\StandarAntropometriController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/privacy-policy', [AuthController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/delete-account', [AuthController::class, 'deleteAccount'])->name('delete-account');
Route::post('/delete-account', [AuthController::class, 'deleteAccountRequest'])->name('delete-account.request');

Route::group(['middleware' => 'auth', ], function() {
    Route::get('/', function() { return redirect()->route('dashboard'); })->name('root');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/user/{id}/admin-status', [UserController::class, 'adminStatus'])->name('user.admin-status');
    Route::post('/user/{username}/change-password', [UserController::class, 'changePassword'])->name('user.change-password');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/{encryptedId}', [ReportController::class, 'show'])->name('report.show');

    Route::get('/result-config', [ResultConfigController::class, 'index'])->name('result-config.index');
    Route::put('/result-config', [ResultConfigController::class, 'update'])->name('result-config.update');

    Route::get('/standar-antropometri', [StandarAntropometriController::class, 'index'])->name('standar-antropometri.index');
    Route::put('/standar-antropometri', [StandarAntropometriController::class, 'update'])->name('standar-antropometri.update');

    Route::get('/pmt-monitor', [PmtMonitorController::class, 'index'])->name('pmt-monitor.index');

    Route::get('/nutritional-status-history', [NutritionalStatusHistoryController::class, 'index'])->name('nutritional-status-history.index');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/test', function () {
    $current_date_time = Carbon\Carbon::now()->toDateTimeString();
    return $current_date_time;
});