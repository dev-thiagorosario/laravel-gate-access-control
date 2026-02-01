<?php

declare(strict_types=1);

namespace App\Enums;

enum CodeExceptionEnum : int
{
    case POST_NOT_FOUND = 404;
    case FAILED_TO_LOAD_PAGE = 500;
    case ERROR_CREATING_POST = 1001;
    case ERROR_LISTING_POSTS = 1002;
    case ERROR_DELETING_POST = 1003;
}
