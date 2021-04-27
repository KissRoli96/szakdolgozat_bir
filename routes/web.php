<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ThesesController;

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

Route::get('/login', [SiteController::class, 'login']);
Route::post('/login', [SiteController::class, 'login']);

Route::get('/user', [UserController::class,'index'] );
Route::get('/user/insert', [UserController::class,'insert'] );
Route::post('/user/insert', [UserController::class,'insert'] );
Route::post('/user/delete/{id}', [UserController::class,'delete']);
Route::get('/user/update/{id}', [UserController::class,'update']);
Route::post('/user/update/{id}', [UserController::class,'update']);
Route::get('/user/view/{id}', [UserController::class,'view'] );


Route::get('/theses', [ThesesController::class, 'index']);
Route::get('/theses/view/{id}', [ThesesController::class, 'view']);

