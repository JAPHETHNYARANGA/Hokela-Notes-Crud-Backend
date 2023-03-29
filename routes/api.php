<?php

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




Route::post('todos', [Notes::class,'addTodo']);

Route::get('todos', [Notes::class, 'getTodos']);

Route::put('updateTodo/{id}', [Notes::class, 'updateTodo']);

Route::get('deleteTodo/{id}', [Notes::class, 'deleteTodo']);
