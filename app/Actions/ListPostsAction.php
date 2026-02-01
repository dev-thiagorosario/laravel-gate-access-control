<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Post;

class ListPostsAction implements ListPostsActionInterface
{
    public function execute(): array
    {
     $posts= Post::with('user')->get();

     return $posts->toArray();
    }
}
