<?php

use App\Http\Controllers\AggrementResource;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/', [BasicController::class, 'landing']);
Route::get('/home', [BasicController::class, 'home'])->name('login');
Route::get('/join', [BasicController::class, 'join'])->middleware('auth');
Route::get('/comingsoon', [BasicController::class, 'comingsoon']);
Route::get('/category/{id}', [BasicController::class, 'category']);

// Route::get('/auth', [UserController::class, 'redirectToProvider']);
// Route::get('/auth/instagram/callback', [UserController::class, 'handleProviderCallback']);

//chat with id
Route::get('/chat/{id}', [PartnerController::class, 'chat'])->middleware('auth');


Route::post('/messages', [ChatController::class, 'sendMessage'])->middleware('auth');

Route::post('/login',[UserController::class,'authenticate']);
Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/register',[UserController::class,'register']);

Route::resource('/partner', PartnerController::class);
Route::resource('/aggrement', AggrementResource::class)->middleware('auth');
Route::put('/aggrement/accept/{id}', [AggrementResource::class, 'accept'])->middleware('auth');
Route::put('/aggrement/finish/{id}', [AggrementResource::class, 'finish'])->middleware('auth');


