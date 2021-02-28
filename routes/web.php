<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/referrerRegister', 'ReferRegisterController@showBusinessRegistrationForm');
Route::post('/referrerRegister', 'ReferRegisterController@create')->name('referrerRegister');

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/patient/info/{id}', 'Api\PatientController@patientInfo');

});

Route::group(['prefix' => 'member', 'middleware' => ['auth', 'verified']], function () {
    /* Start Member Manual */
    Route::post('/registerPatient', 'MemberController@storePatient');
    Route::get('/patient/{id}', 'MemberController@show');
    Route::get('/patient/{id}/edit', 'MemberController@edit');
    Route::get('/patient/destroy/{id}', 'MemberController@destroy');

    Route::post('/emailSubmit', 'MemberController@emailSubmit');
    Route::post('/smsSubmit', 'MemberController@smsSubmit');

    Route::get('/portalManual', 'MemberController@portalManual')->name('portalManual');
    /* End Member Manual */

    /* Start Member QR */
    Route::get('/portalQR', 'MemberController@portalQR')->name('portalQR');
    /* End Member QR */

    Route::get('/generateReviewQR', 'MemberController@generateReviewQR')->name('generateReviewQR');
    Route::post('generateQR', 'MemberController@generateQR');


    /* Start Member Patients */
    Route::get('/portalPatients', 'MemberController@portalPatients')->name('portalPatients');
    Route::post('/activePatient/{id}', 'MemberController@activePatient');
    Route::post('/activeQR', 'MemberController@activeQR');
    Route::post('/retrieveQR', 'MemberController@retrieveQR');
    Route::get('/retrieveQR', 'MemberController@retrieveQR');
    /* End Member Patients */

    /* Start Member Top Referrer */
    Route::get('/portalTopReferrer', 'MemberController@portalTopReferrer')->name('portalTopReferrer');
    Route::get('/portalTopReferrer-edit/{id}', 'MemberController@portalTopReferrerEdit')->name('portalTopReferrerEdit');
    Route::post('/portalTopReferrer-edit/{id}', 'MemberController@portalTopReferrerEditProfile');
    Route::get('/portalTopReferrer/{id}', 'MemberController@portalTopReferrerView');
    Route::post('/activeTopReferrer/{id}', 'MemberController@activeTopReferrer');
    Route::post('/activation', 'MemberController@activation')->name('activation');
    Route::post('/activeReferrer/{id}', 'MemberController@activeReferrer');
    /* End Member Top Referrer */

});

Route::group(['prefix' => 'member', 'middleware' => ['auth', 'verified']], function () {

    Route::resource('/adminUsers', 'UserController');
    Route::get('/adminOffice', 'UserController@adminOffice')->name('adminOffice');
    Route::post('/adminOfficeAdd', 'UserController@adminOfficeAdd');
    Route::get('/adminProfile', 'UserController@adminProfile')->name('adminProfile');
    Route::get('/adminAnalyticsReferrer', 'UserController@adminAnalyticsReferrer')->name('adminAnalyticsReferrer');
    Route::get('/adminAnalyticsTeam', 'UserController@adminAnalyticsTeam')->name('adminAnalyticsTeam');
    Route::get('/adminAnalyticsReview', 'UserController@adminAnalyticsReview')->name('adminAnalyticsReview');
    Route::get('/adminAnalyticsOffice', 'UserController@adminAnalyticsOffice')->name('adminAnalyticsOffice');

});

Route::group(['prefix' => 'business', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/referrerQR', 'ReferrerController@referrerQR')->name('referrerQR');
    Route::get('/referrerRetrieve', 'ReferrerController@referrerRetrieve')->name('referrerRetrieve');
    Route::get('/referrerOffice', 'ReferrerController@referrerOffice')->name('referrerOffice');
    Route::get('/referrerTeam', 'ReferrerController@referrerTeam')->name('referrerTeam');
    Route::get('/referrerReview', 'ReferrerController@referrerReview')->name('referrerReview');

});

Route::group(['prefix' => 'business', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/bsAdminSubscribers', 'BsadminController@bsAdminSubscribers')->name('bsAdminSubscribers');
    Route::get('/bsAdminAnalyticsTopReferrer', 'BsadminController@bsAdminAnalyticsTopReferrer')->name('bsAdminAnalyticsTopReferrer');
    Route::get('/bsAdminAnalyticsTopSubscribers', 'BsadminController@bsAdminAnalyticsTopSubscribers')->name('bsAdminAnalyticsTopSubscribers');
    Route::get('/bsAdminAnalyticsReview', 'BsadminController@bsAdminAnalyticsReview')->name('bsAdminAnalyticsReview');

});

Route::get('review/{dest?}/{emp_id?}', 'HomeController@reviewEmployee');

Route::post('send/qrcode/sms', 'HomeController@sendSMS')->name('sendQrCodeSms');

Route::get('patient/{id}', 'Api\PatientController@activatePatient')->name('activatePatient');
Route::get('patientInformation/{id}', 'Api\PatientController@patientInformation')->name('patientInformation');
Route::get('allPatientData', 'Api\PatientController@allPatientData')->name('allPatientData');
