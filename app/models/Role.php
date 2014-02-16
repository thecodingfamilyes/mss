<?php

class Role extends \LaravelBook\Ardent\Ardent {

	public $timestamps = true;

	public function users()
    {
        return $this->belongsToMany('User', 'user_roles');
    }

    public function scopeAdmin($query) {
    	return $query->where('name', '=', 'admin');
    }

    public function scopeModerator($query) {
    	return $query->where('name', '=', 'moderator');
    }

	public function scopeRegistered($query) {
    	return $query->where('name', '=', 'user');
    }
}
