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

// dd(resolve('App\Billing\Stripe'));

Route::get('/', 'ArticlesController@index')->name('home');

// Via controllers
Route::get('/articles', 'ArticlesController@index');
Route::get('/archive/{year}/{month}', 'ArticlesController@archive')->name('articles.archive');

Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
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

Route::get('/login' , 'SessionsController@login')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout' , 'SessionsController@destroy')->name('logout');

Route::get('/register' , 'RegistrationController@create')->name('register');
Route::post('/register' , 'RegistrationController@store');

// Route::get('/home', 'HomeController@index')->name('home');
