<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});
Route::get('/task/2', function () {
    return view('task');
});
Route::get('/task/3', function () {
    return view('jsontask');
});
Route::get('/task/4', function () {
    return view('task4/task4');
});
Route::get('/task4/update/{id}', function ($id) {
    return view('task4/update')->with('task_id', $id);
});

