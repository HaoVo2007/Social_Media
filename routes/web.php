<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Group;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/403', function() {
    return view('403');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    //PROFILE
    Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/posts/{user}', [ProfileController::class, 'profilePost'])->name('profile.post');
    Route::post('/profile/image/{user}', [ProfileController::class, 'editAvatar'])->name('profile.edit.image');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/follow', [ProfileController::class, 'follow'])->name('profile.follow');
    Route::get('/profile/follow/getdata', [ProfileController::class, 'getData'])->name('profile.getData');
    Route::get('/profile/attechment/{user}', [ProfileController::class, 'attechmentProfile'])->name('profile.attechment');
    Route::get('/profile/getdata/folow/{user}', [ProfileController::class, 'getDataFollow'])->name('profile.getDataFollow');

    //POST
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::post('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::post('/post/reaction/{post}', [PostController::class, 'reaction'])->name('post.reaction');
    //COMMENT   
    Route::get('/post/comment/', [CommentController::class, 'index'])->name('post.index');
    Route::post('/post/comment/{post}', [CommentController::class, 'comment'])->name('post.comment');
    Route::post('/post/comment/update/{comment}', [CommentController::class, 'update'])->name('post.comment.update');
    Route::post('/post/comment/destroy/{comment}', [CommentController::class, 'destroy'])->name('post.comment.destroy');
    Route::post('/post/comment/like/{comment}', [CommentController::class, 'like'])->name('post.comment.like');
    //GROUP
    Route::get('/group', [GroupController::class, 'index'])->name('group.index');
    Route::post('/group', [GroupController::class, 'store'])->name('group.store');
    Route::get('/group/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::get('/group/getdata/{id}', [GroupController::class, 'getData'])->name('group.getData');
    Route::post('/group/avatar/{group}', [GroupController::class, 'editAvatar'])->name('group.editAvatar');
    Route::post('/group/invite/{group}', [GroupController::class, 'invite'])->name('group.invite');
    Route::get('/group/approve/{token}', [GroupController::class, 'approve'])->name('group.approve');
    Route::post('/group/auto_approve/{group}', [GroupController::class, 'autoApprove'])->name('group.autoApprove');
    Route::post('/group/request_approve/{group}', [GroupController::class, 'requestApprove'])->name('group.requestApprove');
    Route::get('/group/reject_approve/{token}', [GroupController::class, 'rejectRequest'])->name('group.rejectRequest');
    Route::get('/group/accept_approve/{token}', [GroupController::class, 'acceptRequest'])->name('group.acceptRequest');
    Route::get('/group/attechment/{group}', [GroupController::class, 'attechmentGroup'])->name('group.attechmentGroup');
});

require __DIR__.'/auth.php';
