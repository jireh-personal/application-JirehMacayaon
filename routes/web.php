<?php

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

Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/login',[App\Http\Controllers\UserController::class,'login'])->name('signin');
Route::get('/register',function(){
    return view('register');
})->name('register');
Route::post('/register',[App\Http\Controllers\UserController::class,'register'])->name('register');

Route::group(['middleware' => 'auth'],function(){
    Route::resource('/profile',App\Http\Controllers\UserController::class);
    Route::post('/logout',[App\Http\Controllers\UserController::class,'logout'])->name('logout');
    Route::post('/deleteUser',[App\Http\Controllers\UserController::class,'deleteUser'])->name('deleteUser');
});
