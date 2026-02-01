<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Collection;

class ListPostsAction implements ListPostsActionInterface
{
    public function execute(): Collection
    {
     $posts = Post::with('user')->get();

     return $posts;
    }
}
