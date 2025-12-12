<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum' )
    ->group(function () {

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::get('/conversations', [ConversationController::class, 'index'])
            ->name('conversations.index');
        Route::post('/conversations', [ConversationController::class, 'store'])
            ->name('conversation.store');
        Route::get('/conversations/{conversation}/messages', [ConversationController::class, 'messages'])
            ->name('conversation.messages');
        Route::post('/conversations/{conversation}/messages', [ConversationController::class, 'storeMessage'])
            ->name('conversation.storeMessage');

});