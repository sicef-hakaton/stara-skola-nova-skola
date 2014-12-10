<?php

class Link extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'links';

	public function type() {
		return $this->belongsTo('Type');
	}

	public function step() {
		return $this->belongsTo('Step');
	}
}
