<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HelpPagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CoachesController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\CompetitionsController;
use App\Http\Controllers\AdminCompetitionsController;

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
// NEWS PAGES
Route::get('/news', [NewsController::class, 'index']);
Route::get('/get-news', [NewsController::class, 'getNews']);
Route::post('/get-one-news', [NewsController::class, 'getOneNews']);
Route::get('/news/{id}', [NewsController::class, 'viewOneNews']);
// COACHES PAGES
Route::get('/coaches', [CoachesController::class, 'index']);
// PARENTS PAGES
Route::get('/parents', [ParentController::class, 'index']);
// COMPETITIONS PAGES
Route::get('/competitions', [CompetitionsController::class, 'index']);
Route::post('/get-year-competitions', [CompetitionsController::class, 'getYearCompetitions']);

Auth::routes();

// ADMIN
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/store-news', [AdminController::class, 'storeNews']);
Route::post('/store-news-img', [AdminController::class, 'updateImg']);
Route::post('/store-news-imgs', [AdminController::class, 'updateImgs']);
Route::post('/destroy-news', [AdminController::class, 'destroyNews']);
Route::post('/store-competition', [AdminCompetitionsController::class, 'storeCompetition']);
Route::post('/edit-competition', [AdminCompetitionsController::class, 'editCompetition']);
Route::post('/destroy-competition', [AdminCompetitionsController::class, 'destroyCompetition']);
    
//DELETE HOME
Route::get('/welcome', [AdminController::class, 'welcome']);

