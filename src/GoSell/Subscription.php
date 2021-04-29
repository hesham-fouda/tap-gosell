<?php

namespace TapPayments\GoSell;

use TapPayments\Api;
use TapPayments\Requests\All;
use TapPayments\Requests\Create;
use TapPayments\Requests\Delete;
use TapPayments\Requests\Update;
use TapPayments\Requests\Verify;

class Subscription extends Api
{
    use Verify;
    use Create;
    use Update;
    use Delete;
    use All;

    protected static $endpoint = '/v2/subscription/v1/';

    public static function retrieve($cu_id = null, $id = null, $options = null)
    {
        self::_validateKey();
        self::_validateQueryString($id);
        $url = static::baseUrl() . static::classUrl() . '/' . $cu_id . '/' . $id;

        return static::_staticRequest('GET', $url, null, $options);
    }

    private static function classUrl()
    {
        return self::$endpoint;
    }

    public static function retrieveAll($id = null, $options = null)
    {
        self::_validateKey();
        self::_validateQueryString($id);
        $url = static::baseUrl() . static::classUrl() . '/' . $id;

        return static::_staticRequest('GET', $url, null, $options);
    }
}
