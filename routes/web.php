<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    //PROFILE
    Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/posts/{user}', [ProfileController::class, 'profilePost'])->name('profile.post');
    Route::post('/profile/image/{user}', [ProfileController::class, 'editAvatar'])->name('profile.edit.image');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //POST
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::post('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

require __DIR__.'/auth.php';
