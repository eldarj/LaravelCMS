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

Route::get('/', 'ArticlesController@index');

// Via controllers
Route::get('/articles', 'ArticlesController@index');

Route::get('/articles/create', 'ArticlesController@create');
Route::post('/articles', 'ArticlesController@store');

Route::get('/articles/{article}', 'ArticlesController@show');
Route::post('articles/{article}', 'CommentsController@store');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

//api example
Route::get('/tasksjson', function() {
	$tasks = DB::table('tasks')->get();

	return $tasks; //returns json alone, not view
});

Route::get('/logout' , 'SessionsController@logout');
Route::get('/login' , 'SessionsController@login');
Route::get('/register' , 'RegistrationController@create');

Route::get('/home', 'HomeController@index')->name('home');
