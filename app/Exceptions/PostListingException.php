<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Enums\CodeExceptionEnum;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostListingException extends HttpException
{
    public function __construct(
        string $message = 'Erro ao listar posts',
        ?\Throwable $previous = null,
        int $code = CodeExceptionEnum::POST_NOT_FOUND->value,
    )
    {
        parent::__construct(404, $message, $previous, [], $code);
    }
}
