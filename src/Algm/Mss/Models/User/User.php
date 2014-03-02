<?php namespace Algm\Mss\Models\User;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;
use \Hash;
use \Role;

class User extends \LaravelBook\Ardent\Ardent implements UserInterface, RemindableInterface {

	use HasRole;

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
 * Appended data
 */
	protected $appends = array('is_admin');

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
		$purge = array('password_confirmation', 'terms', 'captcha');
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

	public function getIsAdminAttribute() {
		return $this->hasRole('admin');
	}

	public function beforeSave() {
		// if there's a new password, hash it

		$this->hash = Hash::make(uniqid());
		$this->status = 'active';
		var_dump('BEFORE');

		return true;
	}

	public function setAdmin() {
		$admin = Role::admin()->get()->toArray();
		if (!empty($admin)) {
			$this->roles()->attach($admin[0]['id']);
		}
	}

	public function setModerator() {
		$moderator = Role::moderator()->get()->toArray();
		if (!empty($moderator)) {
			$this->roles()->attach($moderator[0]['id']);
		}
	}

	public function setRegistered() {
		$registered = Role::registered()->get()->toArray();
		if (!empty($registered)) {
			$this->roles()->attach($registered[0]['id']);
		}
	}

	public function afterCreate() {
		$this->setRegistered();
	}

}