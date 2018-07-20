<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
	/**
	 * Getter for all tasks
	 * @return [view] [array]
	 */
    public function index() 
    {
		$tasks = Task::all();
		return view('tasks.index', compact('tasks'));
    }

    /**
     * Getter for single task
     * @param  Task $task [task passed as id in URL routing]
     * @return [view]           [single object]
     */
    public function show(Task $task) 
    {
    	// $task = Task::find($task->id); we can avoid this

    	// return $task; //JSON

		// return view('tasks.show', compact('task'));

		return view('tasks.show', compact('task'));
    }
}
