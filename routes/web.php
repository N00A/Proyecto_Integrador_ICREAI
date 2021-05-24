<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('auth/login');
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

Route::get('/inicio', 'InicioController@index')->name('inicio')->middleware(['age','verified']);

Route::get('/pdf', 'EscritoController@crearPDF')->name('pdf')->middleware(['age','verified']);

Route::post('/mensaje', 'EscritoController@storeMensaje')->name('escritoMensaje')->middleware(['age','verified']);

Route::resource('administrador', 'AdminController')->middleware(['age','verified']);

Route::resource('moderador', 'ModController')->middleware(['age','verified']);

Route::resource('rol', 'RolController')->middleware(['age','verified']);

Route::resource('escrito', 'EscritoController')->middleware(['age','verified']);

Route::resource('genero', 'GeneroController')->middleware(['age','verified']);

Auth::routes();

Route::get('/profile', 'UserController@profile')->name('user.profile')->middleware(['age','verified']);

Route::post('/profile', 'UserController@update_profile')->name('user.profile.update')->middleware(['age','verified']);

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/email', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');


Route::post('/email', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();

            $user->setRememberToken(Str::random(60));

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/inicio');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
