<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \LaravelBook\Ardent\Ardent implements UserInterface, RemindableInterface {

	public $autoHydrateEntityFromInput = true;
	public $autoPurgeRedundantAttributes = true;
	public static $passwordAttributes  = array('password');
  	public $autoHashPasswordAttributes = true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'hash', 'status', 'banned_at', 'email');

/**
 * Mass asignment available fields
 */
	protected $fillable = array('username', 'display_name', 'email', 'password', 'password_confirmation', 'terms');

/**
 * Validation rules
 */
	public static $rules = array(
	    'username'              => 'required|alphadash|between:4,16|unique:users',
	    'display_name'		    => 'required|between:4,25|unique:users',
	    'email'                 => 'required|email|unique:users',
	    'password'              => 'required|confirmed',
	    'password_confirmation' => 'required',
	    'terms' 		        => 'accepted'
	  );

	function __construct($attributes = array()) {
		parent::__construct($attributes);

		$this->purgeFilters[] = function($key) {
		$purge = array('password_confirmation', 'terms');
			return ! in_array($key, $purge);
		};
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function beforeSave() {
	    // if there's a new password, hash it

	    $this->hash = Hash::make(uniqid());
	    $this->status = 'active';

	    return true;
	}

}