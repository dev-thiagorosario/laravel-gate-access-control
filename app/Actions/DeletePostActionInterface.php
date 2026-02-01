<?php

declare(strict_types=1);

namespace App\Actions;

interface DeletePostActionInterface
{
    public function execute(int $id): void;
}
