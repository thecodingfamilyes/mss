<?php namespace Algm\Mss\Modules\Brotherhood\Models;

use \LaravelBook\Ardent\Ardent;

class Brotherhood extends Ardent {

/**
 * The database table used by the model.
 *
 * @var string
 */
	protected $table = 'brotherhoods';

/**
 * Validation rules
 *
 * @var array
 */
	public static $rules = [
		'user_id' => 'required|exists:users,id',
		'name' => 'required|between:4,150',
		'shortname' => 'between:3,100',
		'day' =>  'required|min:1|max:8|integer'
	];

/**
 * Belongs to User
 */
	public function user() {
		return $this->belongsTo('User');
	}

/**
 *
 */
	public function scopeUser($query, $user) {
		return $query->whereUserId($user);
	}

}