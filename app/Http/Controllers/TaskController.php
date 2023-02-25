<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Service\TaskService;

class TaskController extends Controller
{
    protected $service;

    public function __construct(TaskService $service){
        $this->service = $service;
    }

    public function addTask(TaskRequest $request){
        return $this->service->addTask($request->validated());
    }
}
