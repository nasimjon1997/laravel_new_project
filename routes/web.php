<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\NewController;

use App\Http\Controllers\PostController;

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

Route::get('/add-posts', [PostController::class, 'addPost'])->name('posts.addpost');
Route::resource('categories', CategoryController::class);

Route::get('/news.show', [NewController::class, 'show'])->name('news.show');
Route::resource('news', NewController::class);

Route::resource('posts', PostController::class);
