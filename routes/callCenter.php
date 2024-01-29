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
            'prefix' => 'callCenter',
            'as' => 'callCenter.',
            'namespace' => 'CallCenter'
        ], function(){

            Route::get('/', 'HomeController@index')->name('dashboard');
            Route::get('/events', 'HomeController@events')->name('events');

            Route::get('/form/{event_id}', 'HomeController@form')->name('form');
            Route::post('/form/send', 'HomeController@submit')->name('form.submit');

            Route::get('/pending', 'HomeController@pending')->name('pending');
            Route::get('/delivered', 'HomeController@delivered')->name('delivered');
            Route::get('/canceled', 'HomeController@canceled')->name('canceled');

            Route::post('/request/event/send/whats/{id}', 'HomeController@sendWhats')->name('request.event.send.whats');
            Route::get('/request/event/download/{id}', 'HomeController@download')->name('request.download');

            Route::get('/request/canceled/{id}', 'HomeController@requestCanceled')->name('request.canceled');

            Route::get('/get/form/{event_id}', 'HomeController@getForm')->name('get.form');
            Route::post('/get/form/send', 'HomeController@getFormSubmit')->name('get.form.submit');
            Route::get('/get/form/cancel/{member_id}', 'HomeController@getFormCancel')->name('get.form.cancel');
            Route::get('/get/form/later/{member_id}', 'HomeController@getFormLater')->name('get.form.later');

            Route::get('/getCenterName', 'HomeController@getCenterName')->name('getCenterName');

            Route::get('/update/form/{id}', 'HomeController@updateForm')->name('update.form');
            Route::any('/edit/form', 'HomeController@editForm')->name('form.edit');

        });
});
