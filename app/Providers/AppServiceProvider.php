<?php

namespace App\Providers;

use App\Models\{Category, Post};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer('admin.layouts.layout', function ($view) {
            $view->with('name', Auth::user());
        });

        view()->composer('front.layouts.layout', function ($view) {
            $view->with([
                'posts' => Post::orderBy('view', 'desc')->limit(6)->get(),
                'categories' => Category::all()->where('slug'),
            ]);
        });
    }
}
