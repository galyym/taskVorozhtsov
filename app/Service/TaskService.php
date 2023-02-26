<?php

namespace App\Service;

use App\Models\JsonTask;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function addTask($request): Response|Application|ResponseFactory
    {
        $user = Auth::user();
        $task = $user->tasks()->create($request);

        $json_task = JsonTask::create([
            "data" => json_encode($request),
            "user_id" => $user->id,
        ]); // this doesn't apply to the second task, I decided to write this because I wanted to prepare a record for the third task in this way

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

    public function updateTask($request) {
        $user = Auth::user();
        $task = JsonTask::find($request["id"]);
        $data = json_decode($task->data);

        $request_data = (array) json_decode($request['data']);

        foreach ($request_data as $key => $value) {
            eval("$key = '$value';");
        }

        $task->data = json_encode($data);
        $task->save();
        return response([
            "status" => true,
            "message" => "Task updated successfully",
            "data" => [
                "time" => floor((microtime(true) - LARAVEL_START) * 1000) . " ms",
                'memory' => memory_get_peak_usage() / 1024 / 1024 ." MB"
            ]
        ]);
    }
}
