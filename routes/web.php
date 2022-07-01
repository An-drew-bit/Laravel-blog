<?php

use App\Http\Controllers\{
    AboutController, CategoriesController, ContactController,
    HomeController, TagsController, SearchController,
    CommentController as UserComment
};
use App\Http\Controllers\Post\{PostsController, StandartPostController};
use App\Http\Controllers\Auth\{
    AuthController, ForgotController, RegisterController,
    VerificationController
};
use App\Http\Controllers\Admin\{
    CommentController, CategoryController, TagController,
    PostController, MainController
};
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::post('/', 'subscribe')->name('subscribe');
});

Route::get('/article/{slug}', [PostsController::class, 'index'])->name('posts.single');
Route::get('/category/{slug}', [CategoriesController::class, 'index'])->name('categories.single');
Route::get('/tag/{slug}', [TagsController::class, 'index'])->name('tags.single');

Route::get('/video', function () {
    return view('front.posts.video');
})->name('video');;

Route::get('/audio', function () {
    return view('front.posts.audio');
})->name('audio');;

Route::controller(VerificationController::class)->group(function () {
    Route::get('/email/verify', 'getVerifyForm')
        ->middleware('auth')
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', 'verifycationRequest')
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', 'repeatSendToMail')
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');
});

Route::get('/search', SearchController::class)->name('search');
Route::get('/about', AboutController::class)->name('about');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact', 'contactForm')->name('contact.form');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', MainController::class)->name('admin.index');

    Route::resource('/categories', CategoryController::class)
        ->names('admin.category');
    Route::resource('/tags', TagController::class)
        ->names('admin.tags');
    Route::resource('/posts', PostController::class)
        ->names('admin.posts');
    Route::resource('/comments', CommentController::class)
        ->names('admin.comments');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/comments', UserComment::class)
        ->names('front.comments');
    Route::resource('/articles', StandartPostController::class)
        ->names('front.posts');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'showRegisterForm')->name('register.create');
        Route::post('/register', 'createUser')->name('register.store');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login.create');
        Route::post('/login', 'login')->name('login');
    });

    Route::controller(ForgotController::class)->group(function () {
        Route::get('/forgot', 'showForgotForm')->name('forgot.show');
        Route::post('/forgot', 'forgot')->name('forgot');
    });
});
