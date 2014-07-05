<?php namespace Algm\Mss\Modules\User\Controllers;

use \Auth;
use \View;
use \Input;
use \Redirect;
use \Notification;

class SessionsController extends \Algm\Mss\Controllers\BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = Input::only('username', 'password');
		$credentials['status'] = 'active';

		if (Auth::attempt($credentials)) {
			return Redirect::intended('/');
		} else {
			Notification::error('Nombre de usuario o password incorrecto');
			return Redirect::action('UsersController@create');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::back();
	}

}
