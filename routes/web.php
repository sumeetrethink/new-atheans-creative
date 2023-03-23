<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use Illuminate\Routing\ViewController;
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
Route::get('/user/logout', [LoginController::class, 'logout'])->name('logout');


//                                     landing page
Route::get('/', [LoginController::class, 'landingPage'])->name('landingPage');


//                                  user dashboard (home page)
Route::get('/home', [LoginController::class, 'home'])->name('home')->middleware('CheckUser');

//                                  live
Route::get('/live', [LoginController::class, 'nacLive'])->name('nacLive')->middleware('CheckUser');
//                                  DISCOVER
Route::get('/discover', [DiscoverController::class, 'view'])->name('view');
//get all busienss coordinates in discover page

Route::get('/getBusinessCoords', [BusinessController::class, 'getBusiness'])->name('getBusiness');



//                                  CREATE VIDEOS
Route::get('/upload/video', [VideoController::class, 'uploadForm'])->name('uploadForm');
Route::post('/upload/video', [VideoController::class, 'upload'])->name('upload');
                        // manahe like dislikes
Route::get('/manageLikes', [VideoController::class, 'manageLikes'])->name('manageLikes');
