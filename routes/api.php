<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn () => response()->json(['status' => 'ok']));

Route::apiResource('employees', EmployeeController::class);
//Route::apiResource('tasks', TaskController::class);
