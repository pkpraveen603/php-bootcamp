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
Route::get('/user', [UserController::class, 'getUsers']);
Route::patch('/user/{id}', [UserController::class, 'updateUser']);
Route::post('/user', [UserController::class, 'createUser']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

//post routes
Route::get('/post', [PostController::class, 'getPosts']);
Route::patch('/post/{id}', [PostController::class, 'editPost']);
Route::post('/post', [PostController::class, 'createPost']);
Route::delete('/post/{id}', [PostController::class, 'deletePost']);

//comment routes
Route::get('/comment/{id}', [CommentController::class, 'getComments']);
Route::patch('/comment/{id}', [CommentController::class, 'editComment']);
Route::post('/comment', [CommentController::class, 'addComment']);
Route::delete('/comment/{id}', [CommentController::class, 'deleteComment']);
