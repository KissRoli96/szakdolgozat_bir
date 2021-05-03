<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ThesesController;
use App\Http\Controllers\CourseController;

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
    return view('welcome');
});

Route::get('/about', function () {
   return view('users.about');
});

Route::get('/signup', [SiteController::class, 'signup']);
Route::post('/signup', [SiteController::class, 'signup']);
//
//Route::get('/login', [SiteController::class, 'login']);
//Route::post('/login', [SiteController::class, 'login']);

// userek CRUD
Route::get('/user', [UserController::class,'index'] );
Route::get('/user/insert', [UserController::class,'insert'] );
Route::post('/user/insert', [UserController::class,'insert'] );
Route::post('/user/delete/{id}', [UserController::class,'delete']);
Route::get('/user/update/{id}', [UserController::class,'update']);
Route::post('/user/update/{id}', [UserController::class,'update']);
Route::get('/user/view/{id}', [UserController::class,'view'] );

// Szakdolgozat CRUD
Route::get('/theses', [ThesesController::class, 'index']);
Route::get('/theses/view/{id}', [ThesesController::class, 'view']);
Route::get('/theses/insert', [ThesesController::class, 'insert']);
Route::post('/theses/insert', [ThesesController::class, 'insert']);
Route::post('/theses/delete/{id}', [ThesesController::class, 'delete']);
Route::get('/theses/update/{id}',[ThesesController::class,'update']);
Route::post('/theses/update/{id}',[ThesesController::class,'update']);


// Kurzusok CRUD

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/view/{id}', [CourseController::class, 'view']);
Route::get('/courses/insert',[CourseController::class, 'insert']);
Route::post('/courses/insert',[CourseController::class, 'insert']);
