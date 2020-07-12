<?php

namespace App\Providers;

use App\Builders\Request\VkApi;
use App\Dto\MLDto;
use App\Registry\DataCollectorsRegistry;
use App\Services\DataCollectors\VkDataCollector;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class DataCollectorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DataCollectorsRegistry::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $vkDataCollector = new VkDataCollector(new VkApi, new MLDto);
        $this->app
            ->make(DataCollectorsRegistry::class)
            ->register('vk', $vkDataCollector);
    }
}
