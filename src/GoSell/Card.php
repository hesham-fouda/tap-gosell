<?php

namespace TapPayments\GoSell;

use TapPayments\Api;

class Card extends Api
{
    protected static $endpoint = '/v2/card';

    public static function create($cu_id, $params, $options = null)
    {
        self::_validateKey();
        self::_validateParams('POST', $params);
        $url = static::baseUrl() . static::classUrl() . '/' . $cu_id;

        return static::_staticRequest('POST', $url, $params, $options);
    }

    private static function classUrl()
    {
        return self::$endpoint;
    }

    public static function verify($params, $options = null)
    {
        self::_validateKey();
        self::_validateParams('POST', $params);
        $url = static::baseUrl() . static::classUrl() . '/verify';

        return static::_staticRequest('POST', $url, $params, $options);
    }

    public static function authorize($id, $params, $options = null)
    {
        self::_validateKey();
        self::_validateParams('POST', $params);
        $url = static::baseUrl() . static::classUrl() . '/verify/' . $id;

        return static::_staticRequest('GET', $url, $params, $options);
    }

    public static function retrieve($cu_id = null, $id = null, $options = null)
    {
        self::_validateKey();
        self::_validateQueryString($id);
        $url = static::baseUrl() . static::classUrl() . '/' . $cu_id . '/' . $id;

        return static::_staticRequest('GET', $url, null, $options);
    }

    public static function retrieveAll($id = null, $options = null)
    {
        self::_validateKey();
        self::_validateQueryString($id);
        $url = static::baseUrl() . static::classUrl() . '/' . $id;

        return static::_staticRequest('GET', $url, null, $options);
    }
}
