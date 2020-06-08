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

Route::get('/', function () {
    return view('auth/login');
    });

Route::get('/login', function () {
    return view('login');
})->name('login');
/*
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio')->middleware('age');

Route::get('/escrito', function () {
    return view('escrito');
})->name('escrito')->middleware('age');
*/
Route::get('/publicaciones', function () {
    return view('publicaciones');
})->name('publicaciones')->middleware('age');

Route::get('/bloaqueado', function () {
    return view('errors.bloqueado');
})->name('bloaqueado');

Route::get('/autorizacion', function () {
    return view('errors.autorizacion');
})->name('autorizacion');

Route::get('/inicio','InicioController@index')->name('inicio')->middleware('age');

Route::resource('administrador','AdminController')->middleware('age');

Route::resource('moderador','ModController')->middleware('age');

Route::resource('rol','RolController')->middleware('age');

Route::resource('escrito','EscritoController')->middleware('age');

Route::resource('genero','GeneroController')->middleware('age');

Auth::routes();

Route::get('/profile','UserController@profile')->name('user.profile')->middleware('age');

Route::post('/profile','UserController@update_profile')->name('user.profile.update')->middleware('age');

Route::post('logout','Auth\LoginController@logout')->name('logout');




