<?php

namespace web36\Otp;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Notifications\Notification;
use web36\Otp\Exceptions\IncorrectPhoneNumberFormatException;
use web36\Otp\Sms\AbstractNetgsmMessage;

class NetgsmChannel
{
    protected $netgsm;

    public function __construct(Netgsm $netgsm)
    {
        $this->netgsm = $netgsm;
    }

    /**
     * Send the given notification.
     *
     * @param  $notifiable
     * @param  Notification  $notification
     *
     * @throws Exceptions\CouldNotSendNotification
     * @throws GuzzleException
     * @throws IncorrectPhoneNumberFormatException
     * @throws Exception
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toNetgsm($notifiable);

        if (! $message instanceof AbstractNetgsmMessage) {
            throw new Exception(trans('netgsm::errors.invalid_netgsm_message'));
        }

        if (! $message->getRecipients()) {
            $phone = $notifiable->routeNotificationFor('Netgsm');
            $message->setRecipients($phone);
        }

        $this->netgsm->sendSms($message);
    }
}