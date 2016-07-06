<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Task;


Route::get('/', function () {

	$tasks = Task::orderBy('created_at', 'asc')->get();

    return view('task', [
    	'tasks' => $tasks
    	]);
});

Route::post('/task', 'TaskController@create');
Route::delete('/task/{task}', 'DeleteController@delete');