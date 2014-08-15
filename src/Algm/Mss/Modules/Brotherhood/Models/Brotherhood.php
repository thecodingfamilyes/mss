<?php namespace Algm\Mss\Modules\Brotherhood\Models;

use \LaravelBook\Ardent\Ardent;
//use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Brotherhood extends Ardent {

//	use SoftDeletingTrait;

/**
 * The database table used by the model.
 *
 * @var string
 */
	protected $table = 'brotherhoods';

	public $autoHydrateEntityFromInput = true;
	public $autoPurgeRedundantAttributes = true;

/**
 * Mass asignment available fields
 */
	protected $fillable = [
		'name',
		'shortname',
		'day',
		'vinculation_id',
		'badge'
	];

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
	public function scopeForUser($query, $user) {
		return $query->whereUserId($user);
	}

}