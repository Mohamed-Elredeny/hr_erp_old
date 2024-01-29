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



Route::group([
    'prefix' => 'performance',
    'as' => 'performance.',
    'namespace' => 'Performance'
], function() {

    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('employees', 'EmployeeController');
    Route::get('requests/{type}', 'RequestsController@index')->name('requests.index');
    Route::get('requests/{id}/{type}', 'RequestsController@details')->name('request.details');

});
