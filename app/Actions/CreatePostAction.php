<?php

declare(strict_types=1);

namespace App\Actions;

use App\Exceptions\CreatePostException;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class CreatePostAction implements CreatePostActionInterface
{
    public function execute(array $data): void
    {
        Gate::authorize('post.create');

        $userId = auth()->id();
        if ($userId === null) {
            throw new CreatePostException('Usuario nao autenticado');
        }

        $title = $data['title'] ?? null;
        $body = $data['body'] ?? $data['content'] ?? null;

        if ($title === null || $body === null) {
            throw new CreatePostException('Dados do post incompletos');
        }

        Post::create([
            'user_id' => $userId,
            'title' => $title,
            'body' => $body,
        ]);
    }
}
