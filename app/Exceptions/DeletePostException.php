<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Enums\CodeExceptionEnum;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DeletePostException extends HttpException
{
    public function __construct(
        string $message = 'Erro ao excluir post',
        ?\Throwable $previous = null,
        int $code = CodeExceptionEnum::ERROR_DELETING_POST->value,
    )
    {
        parent::__construct(500, $message, $previous, [], $code);
    }
}
