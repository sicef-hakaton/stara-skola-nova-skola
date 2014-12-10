<?php

class SearchController extends BaseController {
	public function searchPaths() {
		// Split search query in keywords using space as delimiter

        $searchQuery = Input::get('searchQuery');

		$keywords = explode(" ", $searchQuery);

		// Create empty array of paths
		$paths = array();

		// Iterate through each keyword
        foreach ($keywords as $keyword) {
        	// Get tag by keyword
            $tags = Tag::where('name', '=', $keyword)->get();

            // For each tag (should be only one)
            foreach ($tags as $tag) {
            	// Get all paths corresponding to this tag
            	$tmpPaths = $tag->paths->all();
            	// Add all paths from this tag to paths array
            	$paths = array_merge($paths, $tmpPaths);
            }

            // Find all paths that have keyword in the title
            $titlePaths = Path::where('title', 'LIKE', '%' . $keyword . '%')->get()->all();
            // and merge with other paths
            $paths = array_merge($paths, $titlePaths);
        }

        // Remove duplicates
        $paths = array_unique($paths);
        return View::make("search.results", array("paths" => $paths));
	}

    public function searchPathsByGroup($groupId) {
        $paths = Group::find($groupId)->paths()->get();
        return View::make("search.results", array("paths" => $paths));
   }
}
