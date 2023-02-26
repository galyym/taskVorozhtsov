<?php

use App\Http\Controllers\Task4Controller;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'task', 'middleware' => ['auth:sanctum']],function(){
    Route::match(['get', 'post'], '/add', [TaskController::class, 'addTask']);  // task2
    Route::match(['get', 'post'], '/update', [TaskController::class, 'updateTask']); // task3

    Route::apiResource('/task4', Task4Controller::class);
});
