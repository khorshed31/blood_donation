<?php

use Illuminate\Support\Facades\Route;
use Module\Blood\Controllers\PostController;
use Module\Blood\Controllers\IsBloodDonateController;
use Module\Blood\Controllers\ChatController;





Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {


    /*
        |--------------------------------------------------
        | Resource Route
        |--------------------------------------------------
        */
    Route::resources([
        
        'posts'         => PostController::class,
        'is_donate'         => IsBloodDonateController::class,
        'chats'         => ChatController::class,

    ]);

    Route::get('all/posts', [PostController::class, 'allPost'])->name('posts.all');
    Route::post('all/posts/status/{id}', [PostController::class, 'changeStatus'])->name('posts.status');


    Route::post('add-to-like', [PostController::class, 'addToLike'])->name('add-to-like');
    Route::post('like-delete', [PostController::class, 'deletelike'])->name('like-delete');

    Route::post('comment', [PostController::class, 'commentStore'])->name('comments.save');

    Route::get('is/managed', [PostController::class, 'isManaged'])->name('is.managed');


});
