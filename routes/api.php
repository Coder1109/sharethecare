<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/member/adminUser', function (Request $request) {
    return $request->user();
});
Route::post('/home', 'HomeController@store')->name('store');

/* Start mail send message */
Route::get('/mail', function () {
    return (new \App\Notifications\EmailHistory())->toMail(request()->user());
});
Route::post('/emailqr', 'HomeController@emailqr')->name('emailqr');
Route::get('/emailqr', function () {
    return (new \App\Notifications\Emailto())->toMail(request()->user());
});
Route::post('/reviewEamil', 'HomeController@reviewEamil')->name('reviewEamil');
Route::get('/reviewEamil', function () {
    return (new \App\Notifications\Reviews())->toMail(request()->user());
});
/* End mail send message */

/* Start Sms message */
Route::post('/smsSend', 'HomeController@sendCustomMessage')->name('smsSend');
Route::post('/reviewSms', 'HomeController@reviewSms')->name('reviewSms');
/* End Sms message */

Route::post('/referred/patient/qrGenerate', 'HomeController@qrGenerate')->name('qrGenerate');
