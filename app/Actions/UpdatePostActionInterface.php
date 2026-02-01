<?php

declare(strict_types=1);

namespace App\Actions;

interface UpdatePostActionInterface
{
    public function execute(int $id, array $data): void;
}
