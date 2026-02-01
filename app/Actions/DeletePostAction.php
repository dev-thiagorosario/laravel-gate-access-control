<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Post;

class DeletePostAction implements DeletePostActionInterface
{
    public function execute(int $id): void
    {
        Post::findOrFail($id)->delete();
    }
}
