<?php

declare(strict_types=1);

namespace App\Enums;

enum CodeExceptionEnum : int
{
    case POST_NOT_FOUND = 404;
    case FAILED_TO_LOAD_PAGE = 500;
}
