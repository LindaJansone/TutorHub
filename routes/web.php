<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\URL;

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::redirect('/', '/posts');
Route::resource('posts', PostController::class);

URL::forceScheme('https');
