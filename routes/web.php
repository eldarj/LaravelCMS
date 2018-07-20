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
Route::get('/articles/{article}', 'ArticlesController@show');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

//api example
Route::get('/tasksjson', function() {
	$tasks = DB::table('tasks')->get();

	return $tasks; //returns json alone, not view
});