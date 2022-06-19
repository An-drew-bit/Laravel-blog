<?php

namespace App\Providers;

use App\Services\Contracts\Upload;
use App\Services\UploadService;
use App\Queries\Admin\{CategoryBuilder, CommentBuilder, PostBuilder, TagBuilder};
use App\Queries\PostBuilder as PostFrontBuilder;
use App\Queries\Contracts\QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Queries
        $this->app->bind(QueryBuilder::class, CategoryBuilder::class);
        $this->app->bind(QueryBuilder::class, PostBuilder::class);
        $this->app->bind(QueryBuilder::class, TagBuilder::class);
        $this->app->bind(QueryBuilder::class, CommentBuilder::class);

        $this->app->bind(QueryBuilder::class, PostFrontBuilder::class);

        // Services
        $this->app->bind(Upload::class, UploadService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Password::defaults(function () {
            return Password::min(8)
                ->letters()
                ->uncompromised()
                ->numbers();
        });

        Model::preventLazyLoading(!app()->isProduction());
    }
}
