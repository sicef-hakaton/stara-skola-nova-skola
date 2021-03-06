<?php

class Tag extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	public function paths() {
		return $this->belongsToMany('Path');
	}
}
?>