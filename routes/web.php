<?php

use App\Http\Controllers\LoginController;
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


//                                          MAIN SITE WORK

//                                  user login and registration  
Route::get('/login', [LoginController::class, 'loginView'])->name('loginView');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/user/register', [LoginController::class, 'UserRegisterView'])->name('UserRegisterView');
Route::post('/user/register', [LoginController::class, 'UserRegister'])->name('UserRegister');


//                                     landing page
Route::get('/', [LoginController::class, 'landingPage'])->name('landingPage');


//                                  user dashboard (home page)
Route::get('/home', [LoginController::class, 'home'])->name('home')->middleware('CheckUser');

//                                  live
Route::get('/nac-live', [LoginController::class, 'nacLive'])->name('nacLive');
