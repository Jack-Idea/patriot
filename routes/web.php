<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HelpPagesController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [LandingController::class, 'index']);
Route::get('/patriot', [LandingController::class, 'toPatriot']);
Route::post('/send-msg', [LandingController::class, 'sendQuiz']);
// HELP PAGES
Route::get('/policy', [HelpPagesController::class, 'policyPage']);
Route::get('/agreement', [HelpPagesController::class, 'agreementPage']);

Auth::routes();

// ADMIN
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/store-news-img', [AdminController::class, 'updateImg']);
Route::post('/store-news-imgs', [AdminController::class, 'updateImgs']);
    
//DELETE HOME
Route::get('/welcome', [AdminController::class, 'welcome']);

