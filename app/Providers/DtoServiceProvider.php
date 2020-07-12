<?php

namespace App\Providers;

use App\Dto\MLDto;
use App\Dto\ProfileDto;
use App\Dto\SiteDto;
use Illuminate\Support\ServiceProvider;

class DtoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SiteDto::class);
        $this->app->bind(MLDto::class);
        $this->app->bind(ProfileDto::class);
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
