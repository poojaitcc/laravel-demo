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
// use Illuminate\Filesystem\Filesystem;

// app()->singleton('example',function(){
//     return new \App\Example;
// });

Route::get('/', function () {
	// dd(app('foo'));
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
// ->middleware('auth');

Route::get('/projects', 'ProjectsController@index');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/create', 'ProjectsController@create');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit');
Route::patch('/projects/{project}', 'ProjectsController@update');

Route::match(['GET','POST'], 'show', 'ProjectsController@shownew');

Route::get('/projects/{project}/delete', ['as' => 'project.delete', 'uses' => 'ProjectsController@destroy']);

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
// Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

// Route::resource('projects', 'ProjectsController');
