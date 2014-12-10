<?php

class Comment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	public function type() {
		return $this->belongsTo('Type');
	}

	public function user() {
		return $this->belongsTo('User');
	}

    public function post()
    {
        return $this->belongsTo('Path');
    }

	// TODO: public function element() {}
}
