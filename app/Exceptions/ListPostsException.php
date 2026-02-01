<?php

declare(strict_types=1);

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ListPostsException extends HttpException
{
    public function __construct(
        string $message = 'Erro ao carregar os posts',
        ?\Throwable $previous = null,
        int $code = 0,
    )
    {
        parent::__construct(500, $message, $previous, [], $code);
    }
}
