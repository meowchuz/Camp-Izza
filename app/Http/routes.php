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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::get('/home', 'HomeController@index');

Route::get('/registrationForm1','registrationFormController@registrationForm1');
Route::post('/registrationForm1','registrationFormController@handleRegistrationForm1');
Route::get('/registrationForm2','registrationFormController@registrationForm2');
Route::post('/registrationForm2','registrationFormController@handleRegistrationForm2');
Route::get('/registrationForm3','registrationFormController@registrationForm3');
Route::post('/registrationForm3','registrationFormController@handleRegistrationForm3');
Route::get('/registrationFormReview','registrationFormController@registrationFormReview');