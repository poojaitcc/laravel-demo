<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project){
        // $validatedData = request()->validate(['description' => 'required'],
        //     ['description.required'=> 'Description is required']);
        // $project->addTask(request('description'));

        $project->addTask(
            request()->validate(['description' => 'required'])
        );

        // Task::create([
        //     'project_id' =>  $project->id,
        //     'description' => request('description')
        // ]);
        return back();
    }

    public function update(Task $task){
        // if (request()->has('completed') ){
        //     $task->complete();
        // }else{
        //     $task->incomplete();
        // }
        // request()->has('completed') ? $task->complete() : $task->incomplete();

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();
        //
        // $task->complete(request()->has('completed'));

        // $task->update([
        //     'completed' => request()->has('completed')
        // ]);
        return back();
    }


}
