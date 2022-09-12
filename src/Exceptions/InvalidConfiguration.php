<?php

namespace web36\Otp\Exceptions;

class InvalidConfiguration extends AbstractNetgsmException
{
    /**
     * @return static
     */
    public static function configurationNotSet()
    {
        return new static('In order to send notification via netgsm you need to add credentials in the `credentials` key of `config.netgsm`.');
    }
}