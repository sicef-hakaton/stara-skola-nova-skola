<?php

class Step extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'steps';

	public function path() {
		return $this->belongsTo('Path');
	}

	public function links() {
		return $this->hasMany('Link');
	}

	public function users() {
		return $this->hasMany('User');
	}

	public function scopePathss($query, $path_id) {
		return $query->where('path_id', '=', $path_id);
	}
}
