<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Categories
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'allCategories'])->name('categories');
Route::get('/add-category', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('add-category');
Route::post('/new-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('new-category');
Route::get('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete-category/{id}');
Route::post('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete-category/{id}');
Route::get('/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit-category/{id}');
Route::post('/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category/{id}');

//Posts
Route::get('/myposts', [App\Http\Controllers\PostController::class, 'myPosts'])->name('myposts');
Route::get('/add-post', [App\Http\Controllers\PostController::class, 'addPost'])->name('add-post');
Route::post('/new-post', [App\Http\Controllers\PostController::class, 'create'])->name('new-post');
Route::get('/delete-post/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('delete-post/{id}');
Route::post('/delete-post/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('delete-post/{id}');
Route::get('/edit-post/{id}', [App\Http\Controllers\PostController::class, 'editPost'])->name('edit-post/{id}');
Route::post('/edit-post/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('edit-post/{id}');

//Blog
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'allPosts'])->name('blog');
Route::get('/post/{id}', [App\Http\Controllers\BlogController::class, 'onePost'])->name('post/{id}');
Route::post('/new-comment', [App\Http\Controllers\CommentController::class, 'create'])->name('new-comment');
Route::post('/delete-comment', [App\Http\Controllers\CommentController::class, 'delete'])->name('delete-comment');

//Search
Route::get('/search/', [App\Http\Controllers\BlogController::class, 'search'])->name('search');
Route::get('/searchByTag/', [App\Http\Controllers\BlogController::class, 'searchByTag'])->name('searchByTag');

//Settings
Route::get('/edit-image', [App\Http\Controllers\SettingsController::class, 'editImage'])->name('edit-image');
Route::post('/edit-image', [App\Http\Controllers\SettingsController::class, 'editImg'])->name('edit-image');
