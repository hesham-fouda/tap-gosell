<?php

namespace TapPayments\GoSell;

use TapPayments\Api;
use TapPayments\Requests\All;
use TapPayments\Requests\Create;
use TapPayments\Requests\Delete;
use TapPayments\Requests\Retrieve;
use TapPayments\Requests\Update;

class Invoice extends Api
{
    use Create;
    use Retrieve;
    use Update;
    use Delete;
    use All;

    protected static $endpoint = '/v2/invoices';

    private static function classUrl()
    {
        return self::$endpoint;
    }
}
