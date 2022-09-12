# Laravel OTP Service

## Introduction
This libraries is used to generate OTP for user and verify OTP for user 


## Installation

You can install the package via composer:

```
composer require web36/laravel-otp-service
```

## Configuration

As next step, let's publish config file config/otp.php by executing:
```
php artisan vendor:publish --provider="web36\Otp\ServiceProvider" --tag="otp-config"
```

## Settings 

Add the necessary settings for netgsm to the settings (```.env ```) of your project

```
NETGSM_USERCODE=""
NETGSM_SECRET=""
NETGSM_LANGUAGE="tr"
NETGSM_HEADER= ""
NETGSM_BRANDCODE= null
NETGSM_SMS_SENDING_METHOD="xml"
NETGSM_BASE_URI=""
NETGSM_TIMEOUT=
NETGSM_OPERATOR_CODE=""

```

## Usage

### Example 1

### Sending otp for login example

```

use web36\Otp\Sms\NetGsmOtpMessage ;
use web36\Otp\Netgsm ;
use web36\Otp\MessageType\OtpMessages\NetgsmOtpMessages;


class OtpServiceController extends Controller
{
    
    public function sendOtp(Netgsm $netgsm)
    {

    
        $otp_code = rand(100000, 999999);

        $message = (new NetGsmOtpMessage()) // utf 8 karakter kullanılabilir.
             ->setMessage(NetgsmOtpMessages::getLoginMessage($otp_code))
             ->setRecipients(['5xxxxxxxxx']);

        $jobId = $netgsm->sendSms($message);


    }
}

```


    
    


