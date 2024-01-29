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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group([
        'prefix' => 'receiver',
        'as' => 'receiver.',
        'namespace' => 'Receiver'
    ], function(){

        Route::get('/', 'HomeController@index')->name('dashboard');

        Route::get('/delivered', 'HomeController@delivered')->name('delivered');
        Route::get('/canceled', 'HomeController@canceled')->name('canceled');

        Route::get('/request/deliver/{id}', 'HomeController@deliverRequest')->name('deliver.request');
        Route::get('/request/cancel/{id}', 'HomeController@cancelRequest')->name('cancel.request');

    });
});
