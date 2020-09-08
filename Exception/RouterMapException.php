<?php

namespace Baconfy\Exception;

use RuntimeException;

final class RouterMapException extends RuntimeException implements ExceptionInterface
{
    protected $message = '';

    protected $code = '';
}