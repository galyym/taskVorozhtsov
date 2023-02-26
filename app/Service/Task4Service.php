<?php

namespace App\Service;

use App\Http\Resources\Task4Resource;
use App\Models\Task;

class Task4Service
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $tasks = Task::all()->toArray();

        for ($i = 0; $i < count($tasks); $i++) {
            if ($tasks[$i]["user_id"] == $user_id){
                $tasks[$i]["update"] = true;
            }
        }
        return response([
            "status" => true,
            "message" => "success",
            "data" => $tasks
        ]);
    }


    public function show($id){

        $tasks = Task::where("id", $id)->get();

        return response([
            "status" => true,
            "message" => "success",
            "data" => $tasks[0]
        ]);
    }

    public function update($request, $id){

        $task = Task::find($id);

        if ($task->user_id == auth()->user()->id){
            $tasks = Task::where("id", $id, "&")->update($request);

            return response([
                "status" => true,
                "message" => "Task updated successfully",
                "data" => $tasks
            ]);
        }else{
            return response([
                "status" => false,
                "message" => "error",
                "data" => []
            ]);
        }
    }

    public function destroy($id){
        $task = Task::find($id);

        if ($task->user_id == auth()->user()->id){
            $task->delete();
            return response([
                "status" => true,
                "message" => 'Task deleted successfully',
                "data" => []
            ]);
        }else{
            return response([
                "status" => false,
                "message" => "error",
                "data" => []
            ]);
        }
    }
}
