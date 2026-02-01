<?php

declare(strict_types=1);

namespace App\Actions;

interface CreatePostActionInterface
{
    public function execute(array $data): void;
}
