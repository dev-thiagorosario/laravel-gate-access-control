<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Collection;

interface ListPostsActionInterface
{
    public function execute(): Collection;
}
