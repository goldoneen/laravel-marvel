<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UserController@index');

// Show the list of blog posts
Route::get('/posts', [BlogController::class, 'index']);
// Show the the form for creating a new blog post
Route::get('/posts/create', [BlogController::class, 'create']);
// Store a newly created blog post
Route::post('/posts', [BlogController::class, 'store']);
// Show a specitic blog post
Route::get('/posts/{id}', [BlogController::class, 'show']);
// Show the form for editing a blog post
Route::get('/posts/{id}/edit', [BlogController::class, 'edit']);
// Update a specific blog post
Route::put('/posts/{id}', [BlogController::class, 'update']);
// Delete a specific blog post
Route::delete('/posts/{id}', [BlogController::class, 'destroy']);


////////////////////
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
