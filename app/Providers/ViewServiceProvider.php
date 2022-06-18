<?php

namespace App\Providers;

use App\View\Composers\{AppComposer, FrontComposer};
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer('admin.layouts.layout', AppComposer::class);

        View::composer('front.layouts.layout', FrontComposer::class);
    }
}
