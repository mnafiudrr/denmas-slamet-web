<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrequentlyAskedQuestionController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\NutritionalStatusHistoryController;
use App\Http\Controllers\PmtMonitorController;
use App\Http\Controllers\PrinsipTigajController;
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
    Route::get('/result-config/edit', [ResultConfigController::class, 'edit'])->name('result-config.edit');
    Route::put('/result-config/edit', [ResultConfigController::class, 'store'])->name('result-config.store');
    Route::put('/result-config', [ResultConfigController::class, 'update'])->name('result-config.update');

    Route::get('/standar-antropometri', [StandarAntropometriController::class, 'index'])->name('standar-antropometri.index');
    Route::put('/standar-antropometri', [StandarAntropometriController::class, 'update'])->name('standar-antropometri.update');

    Route::get('/pmt-monitor', [PmtMonitorController::class, 'index'])->name('pmt-monitor.index');

    Route::get('/nutritional-status-history', [NutritionalStatusHistoryController::class, 'index'])->name('nutritional-status-history.index');

    Route::get('/prinsip-3j', [PrinsipTigajController::class, 'index'])->name('prinsip-3j.index');
    Route::get('/prinsip-3j/edit', [PrinsipTigajController::class, 'edit'])->name('prinsip-3j.edit');
    Route::put('/prinsip-3j/edit', [PrinsipTigajController::class, 'update'])->name('prinsip-3j.update');

    Route::get('/frequently-asked-questions', [FrequentlyAskedQuestionController::class, 'index'])->name('frequently-asked-questions.index');
    Route::get('/frequently-asked-questions/create', [FrequentlyAskedQuestionController::class, 'create'])->name('frequently-asked-questions.create');
    Route::post('/frequently-asked-questions/create', [FrequentlyAskedQuestionController::class, 'store'])->name('frequently-asked-questions.store');
    Route::get('/frequently-asked-questions/{id}/edit', [FrequentlyAskedQuestionController::class, 'edit'])->name('frequently-asked-questions.edit');
    Route::put('/frequently-asked-questions/{id}/edit', [FrequentlyAskedQuestionController::class, 'update'])->name('frequently-asked-questions.update');
    Route::delete('/frequently-asked-questions/{id}', [FrequentlyAskedQuestionController::class, 'destroy'])->name('frequently-asked-questions.destroy');
    Route::put('/frequently-asked-questions/reorder', [FrequentlyAskedQuestionController::class, 'reorder'])->name('frequently-asked-questions.reorder');

    Route::get('/intervention', [InterventionController::class, 'index'])->name('intervention.index');
    Route::get('/intervention/{id}/edit', [InterventionController::class, 'edit'])->name('intervention.edit');
    Route::put('/intervention/{id}/edit', [InterventionController::class, 'update'])->name('intervention.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/test', function () {
    $current_date_time = Carbon\Carbon::now()->toDateTimeString();
    return $current_date_time;
});