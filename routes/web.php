<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusUpdateController;
use Illuminate\Support\Facades\Auth;
use Module\Blog\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\RegisterController;
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('send-mail', function () {
   
//     $details = [
//         'title' => 'Mail from Test',
//         'body' => 'This is for testing email using smtp'
//     ];
   
//     \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\RegisterMail($details));
   
//     dd("Email is Sent.");
// });



Route::group(['middleware' => 'auth'], function () {


    Route::post('status-update', [StatusUpdateController::class, 'statusUpdate'])->name('status-update');
});
