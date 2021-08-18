<?php

use App\Http\Controllers\Business\DashboardController;
use App\Http\Controllers\Business\LoginController;
use App\Http\Controllers\Business\MarketRequestsController;
use App\Http\Controllers\Business\ProfileController;
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
    Route::get('verify/business/{token}/{name}', [LoginController::class, 'verifyBusiness'])->name('business.auth.verify.business');
    Route::get('business/token/expire/{token}/{name}', [LoginController::class, 'expiredToken'])->name('business.auth.token.expire');
    Route::post('business/token/resend', [LoginController::class, 'resendToken'])->name('business.auth.token.resend');
});

Route::prefix('business')->group(function(){
   Route::middleware('auth:business')->group(function (){

       #------------------------------------------ APPROVED ERROR PAGE ------------------------------------------------#

       Route::get('not/approved', [DashboardController::class, 'notApproved'])->name('business.dashboard.not.approved');

       #------------------------------------------ BUSINESS HOMEPAGE START --------------------------------------------#

       Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('business.dashboard');

       #------------------------------------------ BUSINESS PROFILE START ---------------------------------------------#

       Route::prefix('dashboard/profile')->group(function (){
           Route::get('/', [ProfileController::class, 'index'])->name('business.dashboard.profile.index');
           Route::get('edit', [ProfileController::class, 'edit'])->name('business.dashboard.profile.edit');
           Route::post('update', [ProfileController::class, 'update'])->name('business.dashboard.profile.update');
       });


       Route::group(['middleware' => 'approved', 'prefix' => 'dashboard/business/requests'], function () {
           Route::get('/', [MarketRequestsController::class, 'index'])->name('business.dashboard.request.index');
           Route::get('create', [MarketRequestsController::class, 'create'])->name('business.dashboard.request.create');
           Route::post('store', [MarketRequestsController::class, 'store'])->name('business.dashboard.request.store');
           Route::get('edit', [MarketRequestsController::class, 'edit'])->name('business.dashboard.request.edit');
           Route::post('update', [MarketRequestsController::class, 'update'])->name('business.dashboard.request.update');
           Route::get('details', [MarketRequestsController::class, 'show'])->name('business.dashboard.request.show');
       });

       #------------------------------------------ BUSINESS HOMEPAGE END ----------------------------------------------#

   });
});


Route::prefix('farmers')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
