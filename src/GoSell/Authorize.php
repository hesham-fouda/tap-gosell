<?php

namespace TapPayments\GoSell;

use \TapPayments\Api;
use TapPayments\Requests\All;
use TapPayments\Requests\Create;
use TapPayments\Requests\Retrieve;
use TapPayments\Requests\Update;
use TapPayments\Requests\Voided;

class Authorize extends Api
{
    use Create;
    use Retrieve;
    use Update;
    use Voided;
    use All;

    protected static $endpoint = '/v2/authorize';

    private static function classUrl()
    {
        return self::$endpoint;
    }
}
