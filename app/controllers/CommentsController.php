<?php

	class CommentsController extends BaseController {

		public function getComments($type_id, $element_id) {
			$path = Path::find($element_id);
			$comments = $path->comments()->orderBy('created_at')->get();
			return View::make('paths.comments', array('comments' => $comments));
		}

		public function postComment($type_id, $element_id) {
			if (Auth::check()) {
				$user = Auth::user();
			} else {
				$user = User::find(1);
			}

			$comment = new Comment;
			$comment->body = Input::get('body');
			$comment->element_id = $element_id;
			$comment->type_id = $type_id;
			$comment->user_id = $user->id;

			$comment->save();

			return $this->getComments($type_id, $element_id);
		}
	} 

?>