<?php

namespace App\Providers;

use App\Services\Content\ContentService;
use App\Services\Content\Contracts\GetContentScenarioInterface;
use App\Services\Content\Scenarios\GetContentScenario;
use Illuminate\Support\ServiceProvider;

class ScenariosServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
