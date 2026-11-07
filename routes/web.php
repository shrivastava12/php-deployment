<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{task}', [TaskController::class, 'toggle']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

// Handy for testing the server and PHP version
Route::get('/health', fn () => response()->json([
    'status' => 'ok',
    'php' => PHP_VERSION,
    'laravel' => app()->version(),
    'time' => now()->toDateTimeString(),
]));