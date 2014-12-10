<?php

class PathController extends BaseController {

	public function pathIndex($pathId) {
		$path = Path::find($pathId);
		$order = explode(";", $path->step_ord);
		$steps = array();
		foreach ($order as $stepId) {
			$step = Step::find($stepId);
			if ($step == null) continue;
			array_push($steps, clone $step);
		}

		return View::make('paths.index', array("path" => $path, "steps" => $steps));
	}

	public function getAddPath() {
		return View::make('paths.add');
	}

	/*
		Inputs:
		- path_title
		- path_description
		- path_tags
		- group_count
			group_{group_id}
		- step_count
			- step_{step_id}_title
			- step_{step_id}_description
			- link_count_{step_id}
				- link_{step_id}_{link_id}_title
				- link_{step_id}_{link_id}_url
				- link_{step_id}_{link_id}_description
	*/
	public function postAddPath() {
		// Create new path
		$path = new Path();
		// Assign known values
		$path->title = Input::get('path_title');
		$path->description = Input::get('path_description');
		// Step order (step_ord column) will be assigned when step ids and order are known
		$path_step_ord = array();
		$path->save();

		// Create new Groups
		$groupCount = Input::get('group_count');
		for ($groupId = 0; $groupId < $groupCount; $groupId++) {
			$groupName = "group_" . $groupId;
			$realGroupId = Input::get($groupName);
			$path->groups()->attach($realGroupId);
		}

		// Extract tags from tags string
		$tags = $this->extractTags(Input::get('path_tags'));
		// Add tags in database if they are not already there
		// and connect them with Path
		$this->addAndConnectTags($tags, $path->id);

		// Iterate through each Step input
		$step_count = Input::get('step_count');
		for ($stepId = 0; $stepId < $step_count; $stepId++) {
			// Create step title and description names (used to retrieve content from the _POST array)
			$step_title_name = 'step_' . $stepId . '_title';
			$step_description_name = 'step_' . $stepId . '_description';

			// Create new Step instance
			$step = new Step();
			$step->title = Input::get($step_title_name);
			$step->description = Input::get($step_description_name);
			$step->path_id = $path->id;
			// Save Step in the database
			$step->save();

			// Add Step id in the path_step_ord array
			array_push($path_step_ord, $step->id);

			// Iterate through each Link input (stepId is id sent as the name value of the form input)
			$link_count = Input::get('link_count_' . $stepId);
			for ($linkId = 0; $linkId < $link_count; $linkId++) {
				// Create link title, description and url names
				$link_title_name = $this->createLinkName($stepId, $linkId, "_title");
				$link_description_name = $this->createLinkName($stepId, $linkId, "_description");
				$link_url_name = $this->createLinkName($stepId, $linkId, "_url");

				// Create new Link instance and add to database
				$link = new Link();
				$link->title = Input::get($link_title_name);
				$link->description = Input::get($link_description_name);
				$link->url = Input::get($link_url_name);
				$link->step_id = $step->id;
				$link->type_id = $this->getLinkTypeId($link);
				$link->save();
			}
		}

		// Add steps' order in the path using format: "step_id1;step_id2;...;step_idn"
		// and update in the database
		$path->step_ord = implode(";", $path_step_ord);
		$path->update();

		// Return corresponding view for successfully added Path
		$order = explode(";", $path->step_ord);
		$steps = array();
		foreach ($order as $stepId) {
			$step = Step::find($stepId);
			if ($step == null) continue;
			array_push($steps, clone $step);
		}

		return View::make('paths.index', array("path" => $path, "steps" => $steps));
	}

	private function addAndConnectTags($tags, $pathId) {
		foreach ($tags as $tag) {
			$dbTags = Tag::where('name', '=', $tag)->get();
			if (count($dbTags) == 0) {
				// If tag doesn't exist in the database
				// insert it
				$newTag = new Tag();
				$newTag->name = $tag;
				$newTag->save();
			}
			else {
				// If tag already exists assign it to $newTag
				$newTag = $dbTags[0];
			}

			// Connect Tag->id and Path->id
			$newTag->paths()->attach($pathId);
		}
	}

	private function createLinkName($stepId, $linkId, $name) {
		return 'link_' . $stepId . '_' . $linkId . $name;
	}

	private function getLinkTypeId($link) {
		// TODO: Figure out what should be the type of the link
		// (e.g. "pdf", "youtube link", ...) and create or assign existing type id for it
		return 0;
	}

	private function extractTags($tagsString) {
		$tmp = str_replace(" ", "", $tagsString);
		$tmp = str_replace("\t", "", $tmp);
		$tmp = str_replace("\n", "", $tmp);
		$tags = explode(";", $tmp);
		return $tags;
	}
}
