<?php

use App\Http\Controllers\BallotController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Route::get('/discover', [DiscoverController::class, 'view'])->name('view')->middleware('CheckUser');
//get all busienss coordinates in discover page

Route::get('/getBusinessCoords', [BusinessController::class, 'getBusiness'])->name('getBusiness')->middleware('CheckUser');



//                                  CREATE VIDEOS
Route::get('/upload/video', [VideoController::class, 'uploadForm'])->name('uploadForm')->middleware('CheckUser');
Route::post('/upload/video', [VideoController::class, 'upload'])->name('upload')->middleware('CheckUser');
Route::get('/user/video/edit', [VideoController::class, 'editForm'])->name('editForm')->middleware('CheckUser');
Route::post('/user/video/edit', [VideoController::class, 'edit'])->name('edit')->middleware('CheckUser');
                        
                            // manage like dislikes
Route::get('/manageLikes', [VideoController::class, 'manageLikes'])->name('manageLikes')->middleware('CheckUser');
Route::get('/manageVotes', [VideoController::class, 'manageVotes'])->name('manageVotes')->middleware('CheckUser');
Route::get('/manageVotes', [VideoController::class, 'manageVotes'])->name('manageVotes')->middleware('CheckUser');

//                              USER PROFILE WORK
Route::get('/user/profile', [ProfileController::class, 'viewProfile'])->name('viewProfile')->middleware('CheckUser');
Route::post('/user/update', [ProfileController::class, 'update'])->name('update')->middleware('CheckUser');

//top 100 videos lists
Route::get('/video/top-100', [VideoController::class, 'top100'])->name('top100')->middleware('CheckUser');

//users liked videos  lists
Route::get('/user/video/liked', [VideoController::class, 'likedVideos'])->name('likedVideos')->middleware('CheckUser');

//BALLOT
Route::get('/ballot', [BallotController::class, 'view'])->name('view')->middleware('CheckUser');
Route::post('/ballot/questions', [BallotController::class, 'submitQuestions'])->name('submitQuestions')->middleware('CheckUser');

//                              ADMIN PANNEL
// ADMIN VALIDAION
Route::get('/admin/login', [LoginController::class, 'adminLoginForm'])->name('adminLoginForm');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('adminLogin');
Route::get('admin/logout', [LoginController::class, 'adminLogout'])->name('adminLogout');

// users
Route::get('admin/users/', [UserController::class, 'list'])->name('list')->middleware('AdminUser');
Route::post('/admin/user/delete', [UserController::class, 'delete'])->name('delete')->middleware('AdminUser');
Route::get('admin/users/view/', [UserController::class, 'view'])->name('view')->middleware('AdminUser');
Route::post('admin/users/add', [UserController::class, 'add'])->name('add')->middleware('AdminUser');
Route::post('admin/users/update', [UserController::class, 'update'])->name('update')->middleware('AdminUser');
// business
Route::get('admin/business/', [BusinessController::class, 'list'])->name('list')->middleware('AdminUser');
Route::post('/admin/business/delete', [BusinessController::class, 'delete'])->name('delete')->middleware('AdminUser');
Route::get('admin/business/view/', [BusinessController::class, 'view'])->name('view')->middleware('AdminUser');
Route::post('admin/business/add', [BusinessController::class, 'add'])->name('add')->middleware('AdminUser');
Route::post('admin/business/update', [BusinessController::class, 'update'])->name('update')->middleware('AdminUser');

//Videos
Route::get('admin/videos/', [VideoController::class, 'adminList'])->name('adminList')->middleware('AdminUser');
Route::post('/admin/video/delete', [VideoController::class, 'adminDelete'])->name('adminDelete')->middleware('AdminUser');
Route::get('/admin/video/change-status', [VideoController::class, 'changeStatus'])->name('changeStatus')->middleware('AdminUser');
Route::get('/admin/video/likes', [VideoController::class, 'getVideoLikesList'])->name('getVideoLikesList')->middleware('AdminUser');
