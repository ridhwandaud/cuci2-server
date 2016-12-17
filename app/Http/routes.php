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

Route::get('/', 'BookingsController@show');

Route::get('/edit/{token}','BookingsController@edit');

Route::get('/show/booking','BookingsController@index');

Route::post('/create/booking','BookingsController@store');

Route::post('/save/{id}','BookingsController@save');

Route::get('/delete','BookingsController@delete');

Route::get('/delete/{id}','BookingsController@deleteById');

Route::auth();

Route::get('/home', 'HomeController@index');
