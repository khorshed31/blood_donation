<?php

use Illuminate\Support\Facades\Route;
use Module\Blood\Controllers\PostController;





Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {


    /*
        |--------------------------------------------------
        | Resource Route
        |--------------------------------------------------
        */
    Route::resources([
        
        'posts'         => PostController::class,

    ]);


});
