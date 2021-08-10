<?php

use App\Http\Controllers\Business\DashboardController;
use App\Http\Controllers\Business\LoginController;
use App\Http\Controllers\Business\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainWebsiteController;
use App\Http\Controllers\RequestsController;
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
})->name('website.home');

Route::get('about', [MainWebsiteController::class, 'about'])->name('website.about');
Route::get('market', [MainWebsiteController::class, 'market'])->name('website.market');
Route::get('farmer', [MainWebsiteController::class, 'farmers'])->name('website.farmers');
Route::get('forum', [MainWebsiteController::class, 'forum'])->name('website.forum');

Route::prefix('request')->group(function (){
    Route::any('get/region', [RequestsController::class, 'getRegion'])->name('request.get.region');
});



Auth::routes();




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


Route::prefix('farmers')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
