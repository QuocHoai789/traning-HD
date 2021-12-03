<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected $app;
    public function register()
    {
        //
        $this->app->bind(
            \App\Repositories\PostRepositoryInterface::class,
            \App\Repositories\PostRepository::class,
        );
        $this->app->bind(
            \App\Repositories\UserPostRepositoryInterface::class,
            \App\Repositories\UserPostRepository::class,
        );
        $this->app->bind(
            \App\Repositories\VoucherRepositoryInterface::class,
            \App\Repositories\VoucherRepository::class,
        );
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class,
        );
        $this->app->bind(
            \App\Repositories\EventRepositoryInterface::class,
            \App\Repositories\EventRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        view()->composer('*', function ($view) {
            $categories_frontend = Category::whereNull('parent_id')->with('children')->get();
             $view->with('categories_frontend',$categories_frontend);
        });
    }
}
