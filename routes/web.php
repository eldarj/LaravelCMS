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

use App\Task;

Route::get('/', 'ArticlesController@index');

// Via controllers
Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show');


/*
|---
| Query builders etc. 
|---
*/
// About page - passing vars
Route::get('/about', function() {
	$name = 'Eldar';
	$age = '25';

	$tasks = DB::table('tasks')->latest()->get();

	return view('about', compact('name', 'age', 'tasks'));
});

//api example
Route::get('/tasksjson', function() {
	$tasks = DB::table('tasks')->get();

	return $tasks; //returns json alone, not view
});

// All tasks
Route::get('/tasks', function() {
	// $tasks = DB::table('tasks')->get();

	$tasks = Task::all();

	return view('tasks.index', compact('tasks'));
});

// Specific method->tasks
Route::get('/incomplete', function() {
	// $tasks = DB::table('tasks')->get();

	$tasks = Task::incomplete()->get();

	return view('tasks.index', compact('tasks'));
});

// Single task
Route::get('/tasks/{id}', function($id) {
	// $task = DB::table('tasks')->find($id);

	$task = Task::find($id);

	return view('tasks.show', compact('task'));
});
