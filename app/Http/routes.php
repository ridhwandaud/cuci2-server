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

Route::get('/', 'CardsController@show');

Route::get('/cards','CardsController@index');

Route::post('/cards/store','CardsController@store');

Route::get('/cards/delete','CardsController@delete');