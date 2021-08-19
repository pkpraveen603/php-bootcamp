<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//user routes
Route::get('/user', [UserController::class, 'index']);
Route::patch('/user/{id}', [UserController::class, 'update']);
Route::post('/user', [UserController::class, 'store']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

//post routes
Route::get('/post/{user_id}', [PostController::class, 'index']);
Route::patch('/post/{id}', [PostController::class, 'update']);
Route::post('/post/{user_id}', [PostController::class, 'store']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);

//comment routes
Route::get('/comment/{post_id}', [CommentController::class, 'index']);
Route::post('/comment/{user_id}', [CommentController::class, 'store']);
Route::delete('/comment/{id}', [CommentController::class, 'destroy']);
