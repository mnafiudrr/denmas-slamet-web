<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
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

Route::group(['middleware' => 'auth', ], function() {
    Route::get('/', function() { return redirect()->route('dashboard'); })->name('root');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/user/{id}/admin-status', [UserController::class, 'adminStatus'])->name('user.admin-status');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/{encryptedId}', [ReportController::class, 'show'])->name('report.show');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/test', function () {
    $current_date_time = Carbon\Carbon::now()->toDateTimeString();
    return $current_date_time;
});