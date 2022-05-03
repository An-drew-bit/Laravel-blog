<?php

use App\Http\Controllers\{
    AboutController, CategoriesController, ContactController,
    HomeController, PostsController, TagsController,
    UserController, SearchController
};
use App\Http\Controllers\Admin\{
    CommentController, CategoryController, TagController,
    PostController, MainController
};
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::get('/article/{slug}', [PostsController::class, 'index'])->name('posts.single');
Route::get('/category/{slug}', [CategoriesController::class, 'index'])->name('categories.single');
Route::get('/tag/{slug}', [TagsController::class, 'index'])->name('tags.single');

Route::get('/video', function () {
    return view('front.posts.video');
})->name('video');;

Route::get('/audio', function () {
    return view('front.posts.audio');
})->name('audio');;

Route::get('/standart', function () {
    return view('front.posts.standart');
})->name('standart');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/comments', CommentController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/comments', CommentController::class);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

