<?php

namespace TapPayments\GoSell;

use \TapPayments\Api;
use TapPayments\Requests\All;
use TapPayments\Requests\Create;
use TapPayments\Requests\Retrieve;
use TapPayments\Requests\Update;

class Charges extends Api
{
    use Create;
    use Retrieve;
    use Update;
    use All;

    protected static string $endpoint = '/v2/charges';

    private static function classUrl()
    {
        return self::$endpoint;
    }
}
