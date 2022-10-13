<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::apiResource('category',CategoryController::class);
Route::get('/search/{name}',[CategoryController::class,'search']);
// Route::apiResource('chat',ChatController::class);
Route::post('/chat', [ChatController::class, 'sendMessage']);
Route::post('/message', [messageController::class, 'store']);
