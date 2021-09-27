<?php

use App\Http\Controllers\Business\ClientsController as BusinessClientsController;
use App\Http\Controllers\Business\DashboardController;
use App\Http\Controllers\Business\LoginController;
use App\Http\Controllers\Business\MarketRequestsController;
use App\Http\Controllers\Business\ProfileController;
use App\Http\Controllers\Business\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Farmer\ClientController;
use App\Http\Controllers\Farmer\FarmController;
use App\Http\Controllers\Farmer\ProposalController;
use App\Http\Controllers\Business\ProposalController as BusinessProposalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainWebsiteController;
use App\Http\Controllers\RequestsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Farmer\ProfileController as FarmerProfileController;
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
Route::get('forum', [MainWebsiteController::class, 'forum'])->name('website.forum');


Route::prefix('farmers')->group(function (){
    Route::get('/', [MainWebsiteController::class, 'farmers'])->name('website.farmers');
    Route::get('list', [MainWebsiteController::class, 'listFarmers'])->name('website.farmers.list');
    Route::get('details/{farmer}/{hash}/{slug}', [MainWebsiteController::class, 'farmerDetails'])->name('website.farmers.detail');
});

#----------------------------------------------- WEBSITE MARKET PAGES -------------------------------------------------#
Route::prefix('market')->group(function() {
    Route::get('list', [MainWebsiteController::class, 'listMarket'])->name('website.market.list');
    Route::get('/', [MainWebsiteController::class, 'market'])->name('website.market');
    Route::get('category/{category}', [MainWebsiteController::class, 'marketCategory'])->name('website.market.category');
    Route::get('details/{request}/{hash}/{slug}', [MainWebsiteController::class, 'marketDetail'])->name('website.market.details');

    #------------------------------------------- SUBMIT PROPOSAL ------------------------------------------------------#
    Route::post('{market_request}/{slug}/proposal/submit', [ProposalController::class, 'submitProposal'])->name('website.market.proposal.submit');
});


Route::prefix('request')->group(function (){
    Route::any('get/region', [RequestsController::class, 'getRegion'])->name('request.get.region');
    Route::any('get/farm/subcategory', [RequestsController::class, 'getFarmSubCategory'])->name('request.get.farm.subcategory');
});



Auth::routes(['verify' => true]);




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

       Route::group(['middleware' => 'approved'], function () {

           #-------------------------------------- BUSINESS REQUESTS START --------------------------------------------#

           Route::prefix('dashboard/business/requests')->group(function (){
               Route::get('/', [MarketRequestsController::class, 'index'])->name('business.dashboard.request.index');
               Route::get('create', [MarketRequestsController::class, 'create'])->name('business.dashboard.request.create');
               Route::post('store', [MarketRequestsController::class, 'store'])->name('business.dashboard.request.store');
               Route::get('edit/{request}', [MarketRequestsController::class, 'edit'])->name('business.dashboard.request.edit');
               Route::patch('update/{id}', [MarketRequestsController::class, 'update'])->name('business.dashboard.request.update');
               Route::get('details/{request}', [MarketRequestsController::class, 'show'])->name('business.dashboard.request.show');
               Route::get('card/view', [MarketRequestsController::class, 'cardView'])->name('business.dashboard.request.card.view');
               Route::get('approve/{request}', [MarketRequestsController::class, 'approveRequest'])->name('business.dashboard.request.approve');
               Route::get('delete/{request}', [MarketRequestsController::class, 'deleteRequest'])->name('business.dashboard.request.delete');
           });

           #-------------------------------------- BUSINESS REQUESTS END ----------------------------------------------#


           #-------------------------------------- BUSINESS PROPOSAL START --------------------------------------------#

           Route::prefix('dashboard/proposals')->group(function (){
               Route::get('/', [BusinessProposalController::class, 'index'])->name('business.dashboard.proposal.index');
               Route::get('details/{proposal}/{hash}', [BusinessProposalController::class, 'show'])->name('business.dashboard.proposal.show');
               Route::get('approve/{proposal}', [BusinessProposalController::class, 'approve'])->name('business.dashboard.proposal.approve');
               Route::get('declined/{proposal}', [BusinessProposalController::class, 'decline'])->name('business.dashboard.proposal.decline');
               Route::get('view/farm/{farm}', [BusinessProposalController::class, 'viewFarm'])->name('business.dashboard.proposal.view.farm');
               Route::get('group', [BusinessProposalController::class, 'group'])->name('business.dashboard.proposals.group');
               Route::get('group/{request}/details', [BusinessProposalController::class, 'groupDetail'])->name('business.dashboard.proposals.group.detail');
           });

           #------------------------------------- BUSINESS PROPOSAL END -----------------------------------------------#


           #------------------------------------- BUSINESS CLIENTS START ----------------------------------------------#

           Route::prefix('dashboard/clients')->group(function () {
               Route::get('/', [BusinessClientsController::class, 'index'])->name('business.dashboard.client.index');
               Route::get('{client}/details', [BusinessClientsController::class, 'details'])->name('business.dashboard.client.detail');
               Route::post('{client}/review/add', [BusinessClientsController::class, 'addReview'])->name('business.dashboard.client.review.create');
           });

       });

//       Route::group(['middleware' => 'approved', 'prefix' => 'dashboard/business/requests'], function () {
//           });

       #------------------------------------------ BUSINESS HOMEPAGE END ----------------------------------------------#

   });
});


//Route::prefix('farmer')->group(function () {
//    Route::get('/', [HomeController::class, 'index'])->name('home');
//});

Route::group(['middleware' => 'verified', 'prefix' => 'farmer'], function (){
    #----------------------------------------------- FARMER DASHBOARD -------------------------------------------------#

    Route::get('/', [HomeController::class, 'index'])->name('home');

    #----------------------------------------------- FARMER PROFILE ---------------------------------------------------#

    Route::prefix('profile')->group(function (){
        Route::get('/', [FarmerProfileController::class, 'index'])->name('farmer.dashboard.profile.index');
        Route::get('edit', [FarmerProfileController::class, 'edit'])->name('farmer.dashboard.profile.edit');
        Route::post('update', [FarmerProfileController::class, 'update'])->name('farmer.dashboard.profile.update');
    });

    #----------------------------------------------- FARMER PROFILE END -----------------------------------------------#


    #----------------------------------------------- FARMER FARMS START -----------------------------------------------#

    Route::prefix('farms')->group(function (){
        Route::get('/', [FarmController::class, 'index'])->name('farmer.dashboard.farm.index');
        Route::get('create', [FarmController::class, 'create'])->name('farmer.dashboard.farm.create');
        Route::post('store', [FarmController::class, 'store'])->name('farmer.dashboard.farm.store');
        Route::get('edit/{farm}', [FarmController::class, 'edit'])->name('farmer.dashboard.farm.edit');
        Route::get('details/{farm}', [FarmController::class, 'show'])->name('farmer.dashboard.farm.show');
        Route::patch('update/{farm}', [FarmController::class, 'update'])->name('farmer.dashboard.farm.update');
        Route::get('delete/{farm}', [FarmController::class, 'delete'])->name('farmer.dashboard.farm.delete');
        Route::post('delete/image', [FarmController::class, 'deleteImage'])->name('farmer.dashboard.farm.delete.image');
    });

    #----------------------------------------------- FARMER FARMS END -------------------------------------------------#

    #------------------------------------------------ FARMER PROPOSAL STARTS ------------------------------------------#

    Route::prefix('proposals')->group(function () {
        Route::get('/', [ProposalController::class, 'index'])->name('farmer.dashboard.proposal.index');
        Route::get('{proposal}/details', [ProposalController::class, 'show'])->name('farmer.dashboard.proposal.show');
    });

    #------------------------------------------------ FARMER PROPOSAL ENDS --------------------------------------------#

    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('farmer.dashboard.client.index');
        Route::get('details/{client}', [ClientController::class, 'details'])->name('farmer.dashboard.client.detail');
        Route::get('{request}/details', [ClientController::class, 'clientRequestDetails'])->name('farmer.dashboard.client.request.details');
    });
});
