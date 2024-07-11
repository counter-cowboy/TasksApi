<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('tasks')
//    ->apiResource('tasks', TaskController::class );


    ->group(function (){
        Route::get('/', [TaskController::class, 'index']);
        Route::get('/{task}', [TaskController::class, 'show']);
        Route::post('/',[TaskController::class, 'store']);
        Route::patch('/{task}', [TaskController::class, 'update']);
        Route::delete('/{task}', [TaskController::class, 'destroy']);
    });
