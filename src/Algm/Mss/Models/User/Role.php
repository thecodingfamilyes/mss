<?php namespace Algm\Mss\Models\User;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

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
