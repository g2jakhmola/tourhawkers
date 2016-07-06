<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;

class DeleteController extends Controller
{
    function delete(Task $task){
    	$task->delete();
    	return redirect('/');

    }
}
