<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusUpdateController;
use Illuminate\Support\Facades\Auth;
use Module\Blog\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\DB;
use Module\Blood\Models\Comment;
use Module\Blood\Models\LikePost;
use Module\Blood\Models\Post;

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




Route::get('/fff', [HomeController::class, 'index'])->name('frontend.home');


Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

/*
|---------------------------------------------------------------------------------------
|CUSTOM LOGIN
|---------------------------------------------------------------------------------------
*/

Route::post('signin', [LoginController::class, 'signin'])->name('signin');

Route::get('signup', [RegisterController::class, 'index'])->name('signup');
Route::get('signup/store', [RegisterController::class, 'store'])->name('signup.store');

Route::post('signup/varify', [RegisterController::class, 'varify'])->name('signup.varify');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{email}/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/home', function () {
   
//     $expired_posts = Post::where(DB::raw("STR_TO_DATE(date, '%m/%d/%Y') <= CURDATE()"))
//         ->orWhere(DB::raw("STR_TO_DATE(date, '%m/%d/%Y') = CURDATE() AND TIME_FORMAT(time, '%h:%m:%s %A') < CURTIME()"))
//         ->get();
        
//         foreach ($expired_posts as $key => $value) {
//             $like_post = LikePost::where('post_id', $value->id)->delete();
//             $like_comment = Comment::where('post_id', $value->id)->delete();
//             $value->delete();
//         }
// });



Route::group(['middleware' => 'auth'], function () {


    Route::post('status-update', [StatusUpdateController::class, 'statusUpdate'])->name('status-update');
});
