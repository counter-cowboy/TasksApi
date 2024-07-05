<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('tasks')
    ->group(function (){
        Route::get('/', [TaskController::class, 'Index']);
        Route::get('/{task}', [TaskController::class, 'Show']);
        Route::post('/',[TaskController::class, 'Store']);
        Route::patch('/{task}', [TaskController::class, 'Update']);
        Route::delete('/{task}', [TaskController::class, 'Destroy']);
    });
