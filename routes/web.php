<?php

use App\Http\Controllers\Business\DashboardController;
use App\Http\Controllers\Business\LoginController;
use App\Http\Controllers\Business\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('business/auth')->group(function (){
    Route::get('register', [RegisterController::class, 'index'])->name('business.auth.register');
    Route::post('registerBusiness', [RegisterController::class, 'registerBusiness'])->name('business.auth.register.business');
    Route::get('login', [LoginController::class, 'index'])->name('business.auth.login');
    Route::post('loginBusiness', [LoginController::class, 'login'])->name('business.auth.login.business');
    Route::any('logoutBusiness', [LoginController::class, 'logout'])->name('business.auth.logout');
});

Route::prefix('business')->group(function(){
   Route::middleware('auth:business')->group(function (){
       Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('business.dashboard');
   });
});
