<?php
	class GroupController extends BaseController {
		public function getChildren($groupId) {
			$group = Group::where('parent_id', '=', $groupId)->get();
			return json_encode($group);
		}

		public function getGroup($groupId) {
			$group = Group::where("id", "=", $groupId)->first();
			return json_encode($group);
		}
	} 

?>