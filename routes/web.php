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

// Root and home
Route::get('/', 'ArticlesController@index')->name('home');

// Display all and filtered articles
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/archive/{year}/{month}', 'ArticlesController@archive')->name('articles.archive');
Route::get('articles/tags/{tag}', 'TagsController@index')->name('articles.tags');

// Create and store articles
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::post('/articles', 'ArticlesController@store');

//Delete an article
Route::delete('/articles/{article}', 'ArticlesController@destroy');

// Single article and comments
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::post('articles/{article}', 'CommentsController@store');

// CHAT //
// Chat User signup
Route::get('/chat/signup', 'ChatUserController@create')->name('chat.signup');
Route::post('/chat/signup', 'ChatUserController@store');
// Chat UI
Route::get('/chat', 'ChatMessageController@index')->name('chat.index')->middleware('auth.chat');;
Route::post('/chat', 'ChatMessageController@store')->middleware('auth.chat');;

// PROFILE //
Route::get('/profile/{chatUser}', 'ChatUserController@index')->name('profile');
Route::post('/profile/update', 'ChatUserController@update')->name('profile.update');

// Tasks
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

// Json example
Route::get('/tasksjson', function() {
	$tasks = DB::table('tasks')->get();

	return $tasks; //returns json alone, not view
});

// AUTH //
// Login and logout
Route::get('/login' , 'SessionsController@login')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout' , 'SessionsController@destroy')->name('logout');

// Register
Route::get('/register' , 'RegistrationController@create')->name('register');
Route::post('/register' , 'RegistrationController@store');
