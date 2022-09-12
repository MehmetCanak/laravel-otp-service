<?php

namespace web36\Otp\Balance;

use GuzzleHttp\Exception\GuzzleException;
use web36\Otp\Exceptions\NetgsmException;
use web36\Otp\NetgsmApiClient;
use web36\Otp\NetgsmErrors;

class NetgsmAvailableCredit extends NetgsmApiClient
{
    /**
     * @var string
     */
    protected $response;

    /**
     * @var array
     */
    protected $successCodes = [
        '00',
    ];

    /**
     * @var string
     */
    protected $url = 'balance/list/get';

    /**
     * @var array
     */
    protected $errorCodes = [
        '30'  => NetgsmErrors::CREDENTIALS_INCORRECT,
        '40'  => NetgsmErrors::NO_RECORD,
        '100' => NetgsmErrors::SYSTEM_ERROR,
    ];

    /**
     * extracts credit from the returned response.
     *
     * @return string
     *
     * @throws NetgsmException
     */
    public function parseResponse(): ?string
    {
        $result = explode(' ', $this->response);

        if (empty($result[0])) {
            throw new NetgsmException(NetgsmErrors::NETGSM_GENERAL_ERROR);
        }

        $code = $result[0];

        if (! in_array($code, $this->successCodes)) {
            $message = $this->errorCodes[$code] ?? NetgsmErrors::SYSTEM_ERROR;
            throw new NetgsmException($message, $code);
        }

        return $result[1];
    }

    /**
     * returns the credits amount for associated netgsm account.
     *
     * @throws NetgsmErrors
     * @throws GuzzleException
     * @throws NetgsmException
     */
    public function getCredit(): ?string
    {
        $this->response = $this->callApi('GET', $this->url);

        return $this->parseResponse();
    }
}