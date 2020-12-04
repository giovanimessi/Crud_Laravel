<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('post/ver/{id}',[PostController::class, 'show'])->name('post.show');
Route::get('post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::put('post/update/{id}',[PostController::class, 'update'])->name('post.update');
Route::DELETE('post/delete{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('post/search', [PostController::class, 'search'])->name('post.search');