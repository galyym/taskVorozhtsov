<?php

namespace App\Http\Controllers;

use App\Http\Requests\JsonTaskRequest;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Service\TaskService;

class TaskController extends Controller
{
    protected $service;

    public function __construct(TaskService $service){
        $this->service = $service;
    }

    public function addTask(TaskRequest $request){ // task2
        return $this->service->addTask($request->validated());
    }

    public function updateTask(JsonTaskRequest $request){ //task3
        return $this->service->updateTask($request->validated());
    }
}
