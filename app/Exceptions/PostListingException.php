<?php

namespace App\Exceptions;

use App\Enums\CodeExceptionEnum;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostListingException extends HttpException
{
    public function __construct(
        $message = 'Error ao listar posts',
        \Throwable $previous = null,
        $code = CodeExceptionEnum::POST_NOT_FOUND->value,
    )
    {
        parent::__construct(404, $message, $previous, $code);
    }
}
