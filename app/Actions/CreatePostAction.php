<?php

declare(strict_types=1);

namespace App\Actions;

use App\Exceptions\CreatePostException;
use App\Models\Post;

class CreatePostAction implements CreatePostActionInterface
{
    public function execute(array $data): void
    {
        $title = $data['title'];

        $body = $data['body'];
        
        $userId = auth()->id();

        Post::create([
            'user_id' => $userId,
            'title' => $title,
            'body' => $body,
        ]);
    }
}
