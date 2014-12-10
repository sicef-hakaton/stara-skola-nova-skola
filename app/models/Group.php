<?php

class Group extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';

	public function parent() {
		return $this->belongsTo('Group', 'parent_id');
	}

	public function type() {
		return $this->belongsTo('Type');
	}

	public function paths() {
		return $this->belongsToMany('Path');
	}
}
