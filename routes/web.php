<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingControler;

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

Route::get('/', [LandingControler::class, 'index']);
Route::get('/patriot', [LandingControler::class, 'toPatriot']);
Route::post('/send-msg', [LandingControler::class, 'sendQuiz']);

Auth::routes();

