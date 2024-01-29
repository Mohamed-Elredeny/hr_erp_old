<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
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
    'middleware'=>'auth:employee',
    'prefix' => 'employee',
    'as' => 'employee.',
    'namespace' => 'Employee'
], function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/index', 'HomeController@index')->name('dashboard');
    Route::get('kpi', 'HomeController@kpi')->name('kpi');
    Route::get('kpi/edit/{id}', 'HomeController@editKpi')->name('editKpi');

    Route::any('submitKpi', 'HomeController@submitKpi')->name('submitKpi');
    Route::get('show_kpi', 'HomeController@showKpi')->name('show_kpi');
    Route::get('show_kpiid/{id}', 'HomeController@showKpiid')->name('show_kpi_id');

    Route::get('first_approval', 'HomeController@firstApproval')->name('first_approval');
    Route::post('first_approval/search', 'HomeController@firstApprovalSearch')->name('first_approval_search');
    Route::any('first_approvall/cancel/{id}', 'HomeController@firstApprovalCancel')->name('cancel_first_approval');
    Route::get('first_approval_state/{state}', 'HomeController@firstApprovalState')->name('first_approval_state');
    Route::get('evaluate_first_approval/{id}', 'HomeController@evaluateFirstApproval')->name('evaluate_first_approval');
    Route::get('show_first_approval/{id}', 'HomeController@showFirstApproval')->name('show_first_approval');
    Route::any('submitKpiFirstApproval', 'HomeController@submitKpiFirstApproval')->name('submitKpiFirstApproval');

    Route::get('final_approval', 'HomeController@finalApproval')->name('final_approval');
    Route::post('final_approval/search', 'HomeController@finalApprovalSearch')->name('final_approval_search');
    Route::any('final_approvall/cancel/{id}', 'HomeController@finalApprovalCancel')->name('cancel_final_approval');
    Route::get('final_approval_state/{state}', 'HomeController@finalApprovalState')->name('final_approval_state');
    Route::get('evaluate_final_approval/{id}', 'HomeController@evaluateFinalApproval')->name('evaluate_final_approval');
    Route::get('show_final_approval/{id}', 'HomeController@showFinalApproval')->name('show_final_approval');
    Route::any('submitKpiFinalApproval', 'HomeController@submitKpiFinalApproval')->name('submitKpiFinalApproval');

    Route::get('kpi/policy', 'HomeController@kpiPolicy')->name('kpi.policy');
    Route::get('kpi/cancelationReasons', 'HomeController@cancelationReasons')->name('kpi.show_cancelation_reasons');


//    ------------------------------------------------------------------------

    Route::get('certificate', 'CertificateController@index')->name('certificate.index');
    Route::post('certificate/store', 'CertificateController@store')->name('certificate.store');
    Route::post('certificate/embassy/store', 'CertificateController@embassyStore')->name('embassy.store');
    Route::get('certificate/show_all', 'CertificateController@showAll')->name('certificate.showAll');
    Route::get('certificate/show/{id}', 'CertificateController@show')->name('certificate.show');
//    Route::post('certificate/prepared/confirm', 'CertificateController@preparedConfirm')->name('certificate.prepared.confirm');
//    Route::post('certificate/prepared/reject', 'CertificateController@preparedReject')->name('certificate.prepared.reject');
//    Route::post('certificate/chicking/confirm', 'CertificateController@chickingConfirm')->name('certificate.chicking.confirm');
//    Route::post('certificate/chicking/reject', 'CertificateController@chickingReject')->name('certificate.chicking.reject');
    Route::post('certificate/review/confirm', 'CertificateController@reviewConfirm')->name('certificate.review.confirm');
    Route::post('certificate/review/reject', 'CertificateController@reviewReject')->name('certificate.review.reject');
    Route::post('certificate/approval/confirm', 'CertificateController@approvalConfirm')->name('certificate.approval.confirm');
    Route::post('certificate/approval/reject', 'CertificateController@approvalReject')->name('certificate.approval.reject');
    Route::get('certificate/print/show/{id}', 'CertificateController@printPage')->name('certificate.print');


//    ------------------------------------------------------------------------
    Route::get('welcomeNote/create', 'WelcomeNoteController@create')->name('welcomeNote.create');
    Route::post('welcomeNote/store', 'WelcomeNoteController@store')->name('welcomeNote.store');
    Route::get('welcomeNote/edit/{id}', 'WelcomeNoteController@edit')->name('welcomeNote.edit');
    Route::post('welcomeNote/update/{id}', 'WelcomeNoteController@store')->name('welcomeNote.update');
    Route::get('welcomeNote/list', 'WelcomeNoteController@list')->name('welcomeNote.list');
    Route::get('welcomeNote/list/managers/{employeeType}/{entityId}', 'WelcomeNoteController@getManagers')->name('getManagers.list');

    //Route::get('welcomeNote/{id}/{manager}', 'WelcomeNoteController@index')->name('welcomeNote.index');
    Route::post('welcomeNote', 'WelcomeNoteController@index')->name('welcomeNote.index');

    Route::get('welcomeNote/changeState/{id}/{status}/{all}', 'WelcomeNoteController@changeState')->name('welcomeNote.changeState');
    Route::post('welcomeNote/changeState/{id}/{status}/{all}', 'WelcomeNoteController@changeState')->name('welcomeNote.changeState');

    Route::resource('leaves', LeavesController::class);
    Route::resource('leaveStages', LeaveStagesController::class);
    Route::get('getLeavePolicy', 'LeavesController@getLeavePolicy')->name('getLeavePolicy');
    Route::get('getLeaveInstructions', 'LeavesController@getLeaveInstructions')->name('getLeaveInstructions');


    Route::get('key/{employee}', 'HomeController@key')->name('key');
    Route::any('key/{employee}/update', 'KeyController@update')->name('key.update');
    Route::get('jobApplication/{employee}', 'HomeController@jobApplication')->name('jobApplication');
    Route::any('jobApplication/{employee}/update', 'JobApplicationController@update')->name('jobApplication.update');
    Route::get('relativeForm/{employee}', 'HomeController@relativeForm')->name('relativeForm');
    Route::any('relativeForm/{employee}/update', 'CloseRelativeController@update')->name('relativeForm.update');
    Route::get('employeeConsentForm/{employee}', 'HomeController@employeeConsentForm')->name('employeeConsentForm');
    Route::any('employeeConsentForm/{employee}/update', 'EmployeeConsentController@update')->name('employeeConsentForm.update');
    Route::get('referenceChecking/{employee}', 'HomeController@referenceChecking')->name('referenceChecking');
    Route::any('referenceChecking/{employee}/update', 'ReferenceCheckingController@update')->name('referenceChecking.update');
    Route::get('confidentialityAgreement/{employee}', 'HomeController@confidentialityAgreement')->name('confidentialityAgreement');
    Route::any('confidentialityAgreement/{employee}/update', 'EmployeeConfidentialityController@update')->name('confidentialityAgreement.update');
    Route::get('ethicsPolicy/{employee}', 'HomeController@ethicsPolicy')->name('ethicsPolicy');
    Route::any('ethicsPolicy/{employee}/update', 'EthicsPolicyController@update')->name('ethicsPolicy.update');
    Route::get('nonCompete/{employee}', 'HomeController@nonCompete')->name('nonCompete');
    Route::any('nonCompete/{employee}/update', 'NonCompeteController@update')->name('nonCompete.update');

    Route::get('edit_photo', 'HomeController@editPhoto')->name('edit.photo');
    Route::post('update_photo', 'HomeController@updatePhoto')->name('update.photo');

    Route::get('test', 'EmployeeLeavesController@test')->name('empLeave.test');

    Route::any('kpi/dashboard', 'HomeController@dashboard')->name('kpi.dashboard');
    Route::any('dashboard_approvalll/search', 'HomeController@dashboardSearch')->name('dashboard_approval_search');
    Route::any('dashboard_approvall/cancel/{id}', 'HomeController@dashboardCancel')->name('cancel_dashboard_approval');
});

