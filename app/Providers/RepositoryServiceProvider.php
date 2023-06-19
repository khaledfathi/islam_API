<?php

namespace App\Providers;

use App\Repository\BlogRepository;
use App\Repository\Contract\BlogRepositoryContract;
use App\Repository\Contract\ProductRepositoryContract;
use App\Repository\Contract\ServiceRepositoryContract;
use App\Repository\Contract\UserRepositoryContract;
use App\Repository\ProductRepository;
use App\Repository\ServiceRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class , UserRepository::class); 
        $this->app->bind(ProductRepositoryContract::class , ProductRepository::class); 
        $this->app->bind(BlogRepositoryContract::class , BlogRepository::class); 
        $this->app->bind(ServiceRepositoryContract::class , ServiceRepository::class); 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
