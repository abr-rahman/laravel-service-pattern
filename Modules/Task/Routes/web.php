<?php

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

use Modules\Task\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
Route::get('/task/status/active/{id}', [TaskController::class, 'statusActive'])->name('task.status.active');
Route::get('/task/status/inactive/{id}', [TaskController::class, 'statusInactive'])->name('task.status.inactive');
