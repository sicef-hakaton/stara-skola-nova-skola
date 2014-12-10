<?php

class ProgressController extends BaseController {

	public function completeStep($step_id) {
		if (Auth::check()) {
			$user = Auth::user();
		} else {
			$user = User::find(1);
		}

		$step = Step::find($step_id);
		$user->steps()->attach($step_id);
		$this->checkIfPathCompleted($user, $step->path);

		return "completed";
	}

	public function uncompleteStep($step_id) {
		if (Auth::check()) {
			$user = Auth::user();
		} else {
			$user = User::find(1);
		}

		$step = Step::find($step_id);
		$user->steps()->detach($step_id);
		$this->removeIfPathCompleted($user, $step->path);
		return "uncompleted";
	}

	public function checkIfPathCompleted($user, $path) {
		$stepsOnPath = $this->completedStepsOnPath($user, $path);
		
		$user->paths()->detach($path->id);
		if ($path->steps()->count() == $stepsOnPath) {
			$user->paths()->attach($path->id, array('completed' => 1));
		} else {
			$user->paths()->attach($path->id, array('completed' => 0));
		}
	}

	public function removeIfPathCompleted($user, $path) {
		$user->paths()->detach($path->id);
		$user->paths()->attach($path->id, array('completed' => 0));
	}

	public function completedStepsOnPath($user, $path) {
		return $user->steps()->pathss($path->id)->get()->unique()->count();
	}

} 

?>