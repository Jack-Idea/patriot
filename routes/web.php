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
use App\Http\Controllers\AdminHonorController;
use App\Http\Controllers\ContactsController;

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
Route::get('/competitions/{id}', [CompetitionsController::class, 'showCompetition']);
Route::post('/get-year-competitions', [CompetitionsController::class, 'getYearCompetitions']);
Route::post('/get-one-competition', [CompetitionsController::class, 'getOneCompetition']);
// MEDALISTS COMPONENT
Route::get('/get-medalists', [CompetitionsController::class, 'getMedalists']);
// GALLERY PAGE
Route::get('/gallery', [LandingController::class, 'galleryPage']);
// HONOR PAGE
Route::get('/honor', [LandingController::class, 'honorPage']);
Route::get('/get-bests', [LandingController::class, 'getHonor']);
// CONTACTS PAGE
Route::get('/contacts', [ContactsController::class, 'index']);

Auth::routes();

// ADMIN
Route::get('/admin', [AdminController::class, 'index']);
// ADMIN NEWS
Route::post('/store-news', [AdminController::class, 'storeNews']);
Route::post('/update-news', [AdminController::class, 'updateNews']);
Route::post('/store-news-img', [AdminController::class, 'updateImg']);
Route::post('/store-news-imgs', [AdminController::class, 'updateImgs']);
Route::post('/destroy-news', [AdminController::class, 'destroyNews']);
// ADMIN COMPETITIONS
Route::post('/store-competition', [AdminCompetitionsController::class, 'storeCompetition']);
Route::post('/edit-competition', [AdminCompetitionsController::class, 'editCompetition']);
Route::post('/destroy-competition', [AdminCompetitionsController::class, 'destroyCompetition']);
// ADMIN MEDALISTS
Route::get('/get-admin-medalists', [AdminCompetitionsController::class, 'getAdminMedalists']);
Route::post('/add-medalist', [AdminCompetitionsController::class, 'addMedalist']);
Route::post('/edit-medalist', [AdminCompetitionsController::class, 'editMedalist']);
Route::post('/destroy-medalist', [AdminCompetitionsController::class, 'deleteMedalist']);
//ADMIN HONOR
Route::post('/store-honor', [AdminHonorController::class, 'storeHonor']);
Route::post('/store-honor-img', [AdminHonorController::class, 'storeHonorImg']);
Route::post('/edit-honor', [AdminHonorController::class, 'editHonor']);
Route::post('/destroy-honor', [AdminHonorController::class, 'destroyHonor']);
    
//DELETE HOME
Route::get('/welcome', [AdminController::class, 'welcome']);

