<?php

namespace App\Providers;

use App\Interfaces\ICategoryRepository;
use App\Interfaces\IProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ICategoryRepository::class,
            CategoryRepository::class
        );
        $this->app->bind(
            IProductRepository::class,
            ProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
