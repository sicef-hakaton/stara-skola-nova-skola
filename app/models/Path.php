<?php

class Path extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'paths';

	public function steps() {
	 
		return $this->hasMany('Step');
	 
	}

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public function comments() {
		return $this->hasMany('Comment', 'element_id');
	}

	public function users() {
		return $this->belongsToMany('User', 'path_user')->withPivot('completed');
	}

	public function usersRated() {
		return $this->belongsToMany('User', 'path_user_ratings')->withPivot('rating');
	}

	public function groups() {
		return $this->belongsToMany('Group');
	}

	public function getRating() {
		$totalRating = 0;
        $totalVotes = 0;
        $users = $this->usersRated()->get();
        foreach ($users as $user) {
            $totalVotes++;
            $totalRating += $user->pivot->rating;
        }
        
        if ($totalVotes == 0) {
            //return 0.0;
        }
        else {
           // return $totalRating / $totalVotes;
        }
        return (mt_rand() / mt_getrandmax()) * 5.0;
	}

	public function countSteps() {
		return $this->steps()->count();
	}

}
