<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UsersController;

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
Route::get('/user', [UsersController::class, 'getAllUsers']);
Route::get('/user/{id}', [UsersController::class, 'getUserByID']);
Route::post('/user', [UsersController::class, 'createUserByID']);
Route::delete('/user/{id}', [UsersController::class, 'destroy']);
