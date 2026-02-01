<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ListPostsException extends HttpException
{
    public function __construct($message = 'Error ao carregar os posts',
                                \Throwable $previous = null,
                                $code = 0
    )
    {
        parent::__construct(404, $message, $previous, $headers, $code);
    }
}
