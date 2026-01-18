<?php

namespace App\Providers;

use App\Services\Content\Actions\GetContentAction;
use App\Services\Content\Contracts\GetContentActionInterface;
use App\Services\Content\Scenarios\GetContentScenario;
use Illuminate\Support\ServiceProvider;

class ActionsServiceProvider extends ServiceProvider
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
