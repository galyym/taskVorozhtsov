<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function addTask($data){
        $user = Auth::user();
        $task = $user->tasks()->create($data);

        return response([
            "status" => true,
            "message" => "Task added successfully",
            "data" => $task
        ]);
    }
}
