<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	if (Auth::check()) {
		return View::make('brotherhoods/dashboard');
	}

	return View::make('home');
});

Route::get('/style', function()
{
	return View::make('styleguide');
});

Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');

Route::controller('password', 'RemindersController');

Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::get('terms', function() {
	return View::make('static/terms');
});

Route::group([
	'prefix' => 'api'
], function() {
	Route::resource('brotherhoods', 'BrotherhoodsApiController');
});