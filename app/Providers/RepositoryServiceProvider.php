<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\BusinessOnboardApplicationContract;
use App\Repository\BusinessOnboardApplicationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BusinessOnboardApplicationContract::class, BusinessOnboardApplicationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
