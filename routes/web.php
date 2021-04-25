<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/user', [UserController::class,'index'] );
Route::get('/user/insert', [UserController::class,'insert'] );
Route::post('/user/insert', [UserController::class,'insert'] );
Route::post('/user/delete/{id}', [UserController::class,'delete']);
Route::get('/user/update/{id}', [UserController::class,'update']);
Route::post('/user/update/{id}', [UserController::class,'update']);
Route::get('/user/view/{id}', [UserController::class,'view'] );

