<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    
    // Books routes with role-based access
    Route::get('books', [BookController::class, 'index'])
        ->middleware('role:admin,editor,viewer');
    
    Route::get('books/{book}', [BookController::class, 'show'])
        ->middleware('role:admin,editor,viewer');
    
    Route::post('books', [BookController::class, 'store'])
        ->middleware('role:admin,editor');
    
    Route::put('books/{book}', [BookController::class, 'update'])
        ->middleware('role:admin,editor');
    
    Route::delete('books/{book}', [BookController::class, 'destroy'])
        ->middleware('role:admin');
});