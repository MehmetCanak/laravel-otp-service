<?php

namespace web36\Otp\Exceptions;

use Exception;
use Throwable;

abstract class AbstractNetgsmException extends Exception
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct(trans($message), $code, $previous);
    }
}