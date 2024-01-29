<?php

use App\Http\Controllers\Admin\LeavesTypesController;
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
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function() {

    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::resource('employees', 'EmployeeController');
    Route::post('/employee/import', 'EmployeeController@importEmployee')->name('employee.import');
    Route::post('/employee/excel/edit', 'EmployeeController@editExcelEmployee')->name('employee.edit.excel');
    Route::post('/employee/code', 'EmployeeController@searchEmp')->name('employee.search');
    Route::get('/employe/removeRegister/{id}', 'EmployeeController@removeRegister')->name('employe.removeRegister');

    Route::get('/kpi/all', 'KPIController@all')->name('kpi.all');
    Route::get('/kpi/pending/first', 'KPIController@pendingFirst')->name('kpi.pending.first');
    Route::get('/kpi/pending/final', 'KPIController@pendingFinal')->name('kpi.pending.final');
    Route::get('/kpi/approved', 'KPIController@approved')->name('kpi.approved');

    Route::get('/kpi/evaluate/first/{id}', 'KPIController@evaluateFirst')->name('kpi.evaluate.first');
    Route::post('/kpi/evaluate/first/store', 'KPIController@storeEvaluateFirst')->name('kpi.store.evaluate.first');
    Route::get('/kpi/evaluate/final/{id}', 'KPIController@evaluateFinal')->name('kpi.evaluate.final');
    Route::post('/kpi/evaluate/final/store', 'KPIController@storeEvaluateFinal')->name('kpi.store.evaluate.final');
    Route::get('/kpi/evaluate/show/{id}', 'KPIController@show')->name('kpi.show');
    Route::post('/kpi/evaluate/update', 'KPIController@update')->name('kpi.update');

    Route::post('/kpi/feedback', 'KPIController@feedback')->name('kpi.feedback');

    Route::get('requests/{type}', 'RequestsController@index')->name('requests.index');
    Route::get('requests/{id}/{type}', 'RequestsController@details')->name('request.details');

    Route::any('kpi/search', 'KPIController@kpiSearch')->name('kpi_search');

    Route::resource('leavesTypes', LeavesTypesController::class);
    Route::resource('userDesignations', 'UserDesignationsController');
    Route::post('designationsImportExcel', 'UserDesignationsController@designationsImportExcel')->name('designationsImportExcel');

    /////////////
    Route::post('/emp/cer/import', 'CertificateController@import')->name('employee.certificate.import');

    Route::get('welcome/index', 'WelcomeNoteController@index')->name('welcome.index');
    Route::get('welcome/create', 'WelcomeNoteController@create')->name('welcome.create');
    Route::post('welcome/create/store', 'WelcomeNoteController@store')->name('welcome.create.store');
    Route::get('get/employee/{name}', 'WelcomeNoteController@getEmployee')->name('get.employee');
});
