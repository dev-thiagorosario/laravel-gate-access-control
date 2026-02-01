<?php

namespace App\Exceptions;

use App\Enums\CodeExceptionEnum;
use Symfony\Component\HttpKernel\Exception\HttpException;

class FailedToLoadPageException extends HttpException
{
    public function __construct(
        $message = 'Falha ao carregar pagina',
        \Throwable $previous = null,
        $code = CodeExceptionEnum::FAILED_TO_LOAD_PAGE->value,
    )
    {
        parent::__construct(500, $message, $previous, $code);
    }
}
