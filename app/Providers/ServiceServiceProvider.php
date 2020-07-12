<?php

namespace App\Providers;

use App\Builders\Request\VkApi;
use App\Services\MLService;
use App\Services\SiteDetectionService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SiteDetectionService::class);
        $this->app->bind(MLService::class);
        $this->app->bind(VkApi::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
