<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Authentication
Route::post('login', [Authentication::class,'login']);

Route::post('register',[Authentication::class, 'register']);

Route::get('logout', [Authentication::class,'logout'])->middleware('auth:api');


//Todos

Route::post('todos', [Notes::class,'addTodo'])->middleware('auth:api');

Route::get('todos', [Notes::class, 'getTodos'])->middleware('auth:api');

Route::put('updateTodo/{id}', [Notes::class, 'updateTodo'])->middleware('auth:api');

Route::get('deleteTodo/{id}', [Notes::class, 'deleteTodo'])->middleware('auth:api');

Route::Put('updateStatus/{id}', [Notes::class, 'updateStatus'])->middleware('auth:api');
