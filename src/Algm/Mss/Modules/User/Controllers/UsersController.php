<?php namespace Algm\Mss\Modules\User\Controllers;

use \View;
use \Validator;
use \Notification;
use \Input;
use \Redirect;
use \Auth;
use \Algm\Mss\Modules\User\Repositories\UserRepository as User;

class UsersController extends \Algm\Mss\Controllers\BaseController {

	protected $User;

	public function __construct(User $user) {
		$this->User = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules =  array('captcha' => array('required', 'captcha'));
		$validator = Validator::make(Input::only('captcha'), $rules);
		if ($validator->fails()) {
			Notification::error('No se ha podido efectuar el registro, el captcha es incorrecto.');
			return Redirect::action('UsersController@create')->withInput(Input::except('captcha', 'password', 'password_confirmation'));
		}

		list($result, $user) = $this->User->create(Input::all());

		if (!$result) {
			Notification::error('No se ha podido efectuar el registro, por favor comprueba los errores e inténtalo de nuevo.');
			return Redirect::action('UsersController@create')->withErrors($user->errors());
		} else {
			if (!Auth::check()) {
				Auth::login($user);
			}

			Notification::success('Te has registrado con éxito!');
			return Redirect::intended('/');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
