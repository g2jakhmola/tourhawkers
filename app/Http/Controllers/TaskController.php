<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;

use App\Http\Requests;

class TaskController extends Controller
{
    function create(Request $request){
		$validator = Validator::make($request->all(), [
	        'name' => 'required|max:255',
	    ]);

	    if ($validator->fails()) {
	        return redirect('/taskdetails')
	            ->withInput()
	            ->withErrors($validator);
	    }


	    $task = new Task;
	    $task->name = $request->name;
	    $task->save();

	    return redirect('/taskdetails');
    }
}
