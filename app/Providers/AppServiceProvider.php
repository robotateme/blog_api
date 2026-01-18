<?php

namespace App\Providers;

use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\Contracts\ContentRepositoryInterface;
use App\Services\Content\Actions\GetContentAction;
use App\Services\Content\ContentService;
use App\Services\Content\Contracts\ContentServiceInterface;
use App\Services\Content\Contracts\GetContentActionInterface;
use App\Services\Content\Contracts\GetContentScenarioInterface;
use App\Services\Content\Scenarios\GetContentScenario;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ContentServiceInterface::class, ContentService::class);
        $this->app->singleton(GetContentScenarioInterface::class, GetContentScenario::class);
        $this->app->singleton(GetContentActionInterface::class, GetContentAction::class);
        $this->app->singleton(ContentRepositoryInterface::class, ContentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
