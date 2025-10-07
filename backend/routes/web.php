<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the Chatty API']);
});

// API routes for SPA authentication (with sessions)
Route::middleware(['web'])->group(function () {
    // Authentication routes
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
});
