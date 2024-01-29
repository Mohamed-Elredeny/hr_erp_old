<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
//    Artisan::call('config:cache');
   // return Hash::make(1234);
    return view('home');
})->name('hh');

Auth::routes();
Route::get('/login/{entity}', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/register/{entity}', function ($entity) {
    return view('register', compact('entity'));
})->name('register');

Route::post('user/login', 'Auth\LoginController@UserLogin')->name('auth.login');
Route::post('user/register', 'Auth\RegisterController@empRegister')->name('register.submit');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/activate/{token}', 'Auth\RegisterController@activate')->name('activate');
