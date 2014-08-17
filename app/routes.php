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
		return Redirect::to('/app');
	}

	return View::make('home');
});

Route::get('/app/{path?}', ['before' => 'auth', function() {
	return View::make('app');
}]);

Route::get('/style', function()
{
	return View::make('styleguide');
});

Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');

Route::controller('password', 'RemindersController');

Route::get('login', 'UsersController@create');

Route::get('logout', ['before' => 'auth','uses' => 'SessionsController@destroy']);

Route::get('terms', function() {
	return View::make('static/terms');
});

Route::group([
	'prefix' => 'api',
	'before' => 'auth'
], function() {
	Route::resource('brotherhoods',  'BrotherhoodsApiController');
});