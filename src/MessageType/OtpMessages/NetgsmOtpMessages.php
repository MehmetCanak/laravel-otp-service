<?php

namespace web36\Otp\MessageType\OtpMessages;


class NetgsmOtpMessages
{
    const LOGIN  = 'Degerli Müşterimiz, ::code Kodu ile giriş yapabilirsiniz . Güvenliğiniz için bu kodu kimseyle paylaşmayınız. B021';
    const REGISTER  = 'Degerli Müşterimiz, ::code Kodu ile kayıt işleminizi tamamlayabilirsiniz . Güvenliğiniz için bu kodu kimseyle paylaşmayınız. B021';
    const CHANGE_PASSWORD  = 'Degerli Müşterimiz, ::code Kodu ile şifre değişikliğini tamamlayabilirsiniz . Güvenliğiniz için bu kodu kimseyle paylaşmayınız. B021';

    public static function getLoginMessage($code)
    {
        return str_replace('::code', $code, self::LOGIN);
    }

    public static function getRegisterMessage($code)
    {
        return str_replace('::code', $code, self::REGISTER);
    }

    public static function getChangePasswordMessage($code)
    {
        return str_replace('::code', $code, self::CHANGE_PASSWORD);
    }
    




}
