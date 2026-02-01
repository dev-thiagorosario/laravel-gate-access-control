<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class UpdatePostAction implements UpdatePostActionInterface
{
    public function execute(int $id, array $data): void
    {
        $post = Post::findOrFail($id);

        $title = $data['title'];
        $body = $data['body'];

        $post->update([
            'title' => $title,
            'body' => $body,
        ]);
    }
}
