<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('\App\Http\Controllers')
    ->prefix('tasks')
    ->group(function (){
        Route::get('/', [TaskController::class, 'Index']);
        Route::get('/{task}', [TaskController::class, 'Show']);
        Route::post('/',[TaskController::class, 'Store']);
        Route::patch('/{task}', [TaskController::class, 'Update']);
        Route::delete('/{task}', [TaskController::class, 'Destroy']);
    });
