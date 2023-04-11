<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\PostRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
