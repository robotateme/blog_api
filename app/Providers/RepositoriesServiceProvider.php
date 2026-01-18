<?php

namespace App\Providers;

use App\Models\Post;
use App\Repositories\Content\ContentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(ContentRepository::class)
            ->needs(Model::class)
            ->give(Post::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
