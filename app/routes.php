<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/register', 'UserController@getRegisterUser');
Route::post('/register', 'UserController@postRegisterUser');

Route::get('/login', "UserController@getLoginUser");
Route::post('/login', "UserController@postLoginUser");
Route::get('/logout', "UserController@getLogoutUser");

Route::get('/profile', "UserController@getProfile");

Route::post('/Comment/{type_id}/{element_id}', 'CommentsController@postComment');
Route::get('/Comment/{type_id}/{element_id}', 'CommentsController@getComments');

Route::get('/CompleteStep/{step_id}', 'ProgressController@completeStep');
Route::get('/UncompleteStep/{step_id}', 'ProgressController@uncompleteStep');
Route::post('/CompleteStep/{step_id}', 'ProgressController@completeStep');
Route::post('/UncompleteStep/{step_id}', 'ProgressController@uncompleteStep');

Route::get('/add_path', "PathController@getAddPath");
Route::post('/add_path', "PathController@postAddPath");

Route::get('/path/{path_id}', "PathController@pathIndex");

Route::get('/search', "SearchController@searchPaths");
Route::get('/search/{groupId}', "SearchController@searchPathsByGroup");

Route::get('/rate/{path_id}/{rating}', "RatingController@ratePath")
	->where('rating', '[1-5]');

Route::get('/groupChildren/{group_id}', 'GroupController@getChildren');
Route::get('/getGroup/{group_id}', 'GroupController@getGroup');
