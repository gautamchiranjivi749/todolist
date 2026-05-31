<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\http\Controllers\TaskManager;

class TaskManager extends Controller
{
    

    function listTask()
    {
        $tasks = Tasks::Where("user_id", auth()->user()->id)
        ->Where("status", NULL)->paginate(3);
        return view("welcome", compact("tasks"));
    }

    function addTask()
    {
        return view("tasks.add");
    }

    function addTaskPost(Request $request)
    {
        $request->validate([
            'title'=> 'required | string | max:255',
            'description'=> 'required | string',
            'deadline'=> 'required | date'
        ]);
        $task = new Tasks();
        $task->title=$request->title;
        $task->description=$request->description;
        $task->deadline=$request->deadline;
        $task->user_id=auth()->user()->id;

        // $task->status=$request->active ? "active" : "inactive";
        if($task->save())
            {
                // return back()->with("success", "Task added successfully.");
             return redirect(route("home"))->with("success", "Task added successfully.");
            }
             return redirect(route("tasks.add"))->with("error", "Failed to add task. Please try again.");
    }

    function updateTaskStatus($id)
    {
        if(Tasks::Where("user_id", auth()->user()->id)->
        where('id',$id)->update(["status"=>"completed"])){
            return redirect(route("home"))->with("success", "Task Completed successfully.");

        }
        return redirect(route("home"))->with("error", "Failed to update task. Please try again.");

    }

    function deleteTask($id)
    {
        if(Tasks::Where("user_id", auth()->user()->id)->
        where('id',$id)->Where("id",$id)->delete()){
            return redirect(route("home"))->with("success", "Task Deleted successfully.");

        }
        return redirect(route("home"))->with("error", "Failed to delete task. Please try again.");

    }



}
