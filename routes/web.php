<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| ARTICLES
|--------------------------------------------------------------------------
*/
Route::get('/', 'ArticlesController@index')->name('home');

// Display all and filtered articles
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/archive/{year}/{month}', 'ArticlesController@archive')->name('articles.archive');
Route::get('articles/tags/{tag}', 'TagsController@index')->name('articles.tags');

// Create and store articles
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::post('/articles', 'ArticlesController@store');

// Single article and comments
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::post('articles/{article}', 'CommentsController@store');

//Delete an article
Route::delete('/articles/{article}', 'ArticlesController@destroy');


/*
|--------------------------------------------------------------------------
| CHAT
|--------------------------------------------------------------------------
*/
// Chat
Route::get('/chat', 'ChatMessageController@index')->name('chat.index')->middleware('auth.chat');
Route::post('/chat', 'ChatMessageController@store')->middleware('auth.chat');

// Chat User signup
Route::get('/chat/signup', 'ChatUserController@create')->name('chat.signup');
Route::post('/chat/signup', 'ChatUserController@store');


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::get('/profile/{chatUser}', 'ChatUserController@index')->name('profile')->middleware('auth.chat');
Route::post('/profile/update', 'ChatUserController@update')->name('profile.update')->middleware('auth.chat');

/*
|--------------------------------------------------------------------------
| FRIENDS
|--------------------------------------------------------------------------
*/
Route::get('/friends', 'FriendsController@index')->name('friends')->middleware('auth.chat');

Route::get('/friends/requests', 'FriendsController@requests')->name('friends.requests')->middleware('auth.chat');
Route::get('/friends/settings/{chatUser1}/{chatUser2}', 'FriendsController@friendship_settings')->name('friends.friendship_settings')->middleware('auth.chat');
Route::get('/friends/confirm/{friends}', 'FriendsController@confirm')->name('friends.confirm')->middleware('auth.chat');

Route::get('/friends/{chatUser}', 'FriendsController@add')->name('friends.add')->middleware('auth.chat');
Route::get('/friends/find', 'FriendsController@find')->name('friends.find')->middleware('auth.chat');

/*
|--------------------------------------------------------------------------
| Auth:: login & register
|--------------------------------------------------------------------------
*/
Route::get('/login' , 'SessionsController@login')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout' , 'SessionsController@destroy')->name('logout');

// Register
Route::get('/register' , 'RegistrationController@create')->name('register');
Route::post('/register' , 'RegistrationController@store');

/*
|--------------------------------------------------------------------------
| Tasks
|--------------------------------------------------------------------------
*/
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

/*
|--------------------------------------------------------------------------
| Tasksjson
|--------------------------------------------------------------------------
*/
Route::get('/tasksjson', function() {
	$tasks = DB::table('tasks')->get();

	return $tasks; //returns json alone, not view
});