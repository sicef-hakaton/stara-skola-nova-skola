<?php

class RatingController extends BaseController {
	public function ratePath($pathId, $rating) {
        $user = Auth::user();
        $user->ratedPaths()->detach($pathId);
        $user->ratedPaths()->attach($pathId, array('rating' => $rating));
        return $this->getRating($pathId);
	}

    public function getRating($pathId) {
        $totalRating = 0;
        $totalVotes = 0;
        $users = Path::find($pathId)->usersRated()->get();
        foreach ($users as $user) {
            $totalVotes++;
            $totalRating += $user->pivot->rating;
        }
        
        if ($totalVotes == 0) {
            return 0.0;
        }
        else {
            return $totalRating / $totalVotes;
        }
    }
}
