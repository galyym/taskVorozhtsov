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
            "data" => [
                "task" => $task,
                "time" => floor((microtime(true) - LARAVEL_START) * 1000) . " ms",
                'memory' => memory_get_peak_usage() / 1024 / 1024 ." MB"
            ]
        ]);
    }
}
