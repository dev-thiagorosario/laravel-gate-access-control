<?php

namespace App\Providers;

use App\Actions\ListPostsAction;
use App\Actions\ListPostsActionInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ListPostsActionInterface::class, ListPostsAction::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
