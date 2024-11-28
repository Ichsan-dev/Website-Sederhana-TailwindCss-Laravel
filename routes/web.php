<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JumbotronController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('LandingPage');
Route::get('/login', [SessionController::class,'index'])->name('login');
Route::post('/login-proses', [SessionController::class,'login'])->name('login-proses');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [SessionController::class,'logout'])->name('logout');

    Route::get('/jumbotron', [JumbotronController::class,'index'])->name('jumbotron');
    Route::put('/jumbotron/update/{id}', [JumbotronController::class, 'update'])->name('JumbotronUpdate');

    Route::get('/service', [ServiceController::class, 'index'])->name('ServiceWebsite');
    Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('ServiceUpdate');

    Route::get('/portofolio', [PortofolioController::class, 'index'])->name('PortofolioWebsite');
    Route::put('/portofolio/update/{id}', [PortofolioController::class, 'update'])->name('PortofolioUpdate');

    Route::get('/About', [AboutController::class, 'index'])->name('AboutWebsite');
    Route::put('/About/update/{id}', [AboutController::class, 'update'])->name('AboutUpdate');

    Route::get('/Reset-passowrd', [ResetPasswordController::class, 'index'])->name('ResetPassword');
    Route::post('/Update/Passowrd', [ResetPasswordController::class, 'UpdatePassword'])->name('UpdatePassword');


});