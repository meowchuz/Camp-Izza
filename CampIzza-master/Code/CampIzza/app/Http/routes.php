<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Authentication
 */
Route::auth();

Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

/**
 * Dashboard
 */
Route::group(['middleware' => ['auth']], function() {

    Route::get('/contact', 'ParentController@contact')->name('contact');
    Route::post('/contact', 'ParentController@saveContact')->name('saveContact');
    Route::patch('/contact', 'ParentController@updateContact')->name('updateContact');

    Route::get('/parents', 'ParentController@parents')->name('parents');

    Route::get('/campers', 'CamperController@campers')->name('campers');
    Route::post('/campers', 'CamperController@addCamper')->name('addCamper');
    Route::patch('/campers/{camper}', 'CamperController@updateCamper')->name('updateCamper');

    Route::get('/registrationForm1','registrationFormController@registrationForm1')->name('registrationForm1');
    Route::post('/registrationForm1','registrationFormController@handleRegistrationForm1')->name('handleRegistrationForm1');

    Route::get('/registrationForm2','registrationFormController@registrationForm2')->name('registrationForm2');
    Route::post('/registrationForm2','registrationFormController@handleRegistrationForm2')->name('handleRegistrationForm2');

    Route::get('/registrationForm3','registrationFormController@registrationForm3')->name('registrationForm3');
    Route::post('/registrationForm3','registrationFormController@handleRegistrationForm3')->name('handleRegistrationForm3');

    Route::get('/registrationFormReview','registrationFormController@registrationFormReview')->name('registrationFormReview');
    Route::post('/registrationFormReview','registrationFormController@handleRegistrationFormReview')->name('handleRegistrationFormReview');

    Route::post('/registrationFormTEST','registrationFormController@handleRegistrationFormTEST')->name('handleRegistrationFormTEST');

    Route::group(['middleware' => ['user']], function() {
        Route::get('/', 'HomeController@index');
    });
});

/**
 * APIs
 */
Route::group(['prefix' => 'api'], function() {
    Route::get('/countries', 'ApiController@getCountries');
    Route::get('/states', 'ApiController@getStates');
    Route::get('/states/{state}', 'ApiController@getCitiesByState');

    Route::get('/recaptcha', 'ApiController@verifyReCaptcha');

    Route::get('/campers/{camper}', 'ApiController@camper');
    Route::get('/parents/{parent}', 'ApiController@parent');
});
