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

/*Route::get('/', function(){
    return view('LoginModule/login-view');
})->name('login');
*/
Route::get('/', 'LoginController@index')->name('login');

Route::name('login.')->group(function(){

	Route::get('register-view', 'LoginController@create')->name('register-view');

	Route::get('register-get/{id}', 'LoginController@show')->name('register-get');

	Route::post('register-post','LoginController@store')->name('register-post');

	Route::get('register-edit/{id}', 'LoginController@edit')->name('register-edit');
	
	Route::post('register-put', 'LoginController@update')->name('register-put');

	Route::get('register-patch/{id}/status/{status}', 'LoginController@modifyStatus')->name('register-patch');	

	Route::get('register-delete/{id}', 'LoginController@destroy')->name('register-delete');

	Route::post('login-post', 'LoginController@login')->name('login-post');

	Route::post('forgot-password-post', 'LoginController@forgotPassword')->name('forgot-password-post');

	Route::get('forgot-password',function(){
		return view('LoginModule.password-view');
	})->name('forgot-password');
	
});
