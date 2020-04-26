<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');


Route::get('/escrito', function () {
    return view('escrito');
})->name('escrito');

Route::get('/publicaciones', function () {
    return view('publicaciones');
})->name('publicaciones');

Route::resource('administrador', 'UserController');

Auth::routes();

Route::get('/profile', 'UserController@profile')->name('user.profile');

Route::patch('/profile', 'UserController@update_profile')->name('user.profile.update');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');




