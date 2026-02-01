<?php

namespace App\Providers;

use App\Actions\CreatePostAction;
use App\Actions\CreatePostActionInterface;
use App\Actions\UpdatePostAction;
use App\Actions\UpdatePostActionInterface;
use App\Actions\ListPostsAction;
use App\Actions\ListPostsActionInterface;
use App\Actions\DeletePostAction;
use App\Actions\DeletePostActionInterface;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CreatePostActionInterface::class, CreatePostAction::class);
        $this->app->bind(UpdatePostActionInterface::class, UpdatePostAction::class);
        $this->app->bind(ListPostsActionInterface::class, ListPostsAction::class);
        $this->app->bind(DeletePostActionInterface::class, DeletePostAction::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('post.create', function (User $user) {
            return ($user->role === 'admin' || $user->role === 'user');
        });

        Gate::define('post.update', function (User $user, Post $post) {
            return ($user->role === 'admin' || $user->id === $post->user_id);
        });

        Gate::define('post.delete', function (User $user, Post $post) {
            return ($user->role === 'admin' || $user->id === $post->user_id);
        });
    }
}
