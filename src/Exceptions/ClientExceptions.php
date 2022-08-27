<?php

namespace web36\Otp;

use Exception;


class ClientExceptions extends Exception
{
    public function __construct($message = '', $exception_code = 0, Throwable $previous = null)
    {
        // parent::__construct('SMS client is not found', 0, $previous);
        parent::__construct(trans($message), $code, $previous);
    }
}