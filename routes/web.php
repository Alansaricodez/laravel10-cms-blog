<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('locale/{locale}', function ($locale){
    session()->put('locale', $locale);
    if (request()->fullUrl() === redirect()->back()->getTargetUrl()) {
        return redirect('/');
    }

    return redirect()->back();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('post.index');
    Route::get('/posts/{post:slug}', 'show')->name('post.show');
    Route::get('/post-create', 'create')->name('post.create');
    Route::post('/post', 'store')->name('post.store');
    Route::get('/posts/{post:slug}/edit', 'edit')->name('post.edit');
    Route::patch('/posts/{post:slug}/update', 'update')->name('post.update');
    Route::delete('/posts/{post:slug}/delete', 'destroy')->name('post.destroy');

    //posts by category
    Route::get('/{category:name_en}/posts', 'byCategory')->name('post.category');
});

//get user posts
Route::view('/userPosts', 'post.userPosts')->middleware('auth')->name('post.myPosts');

//comments routes
Route::post('/{post:slug}/comment', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');


Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

Route::post('contact', [MessageController::class, 'send'])->name('send.message');




Route::get('/search', [HomeController::class, 'search'])->name('search');