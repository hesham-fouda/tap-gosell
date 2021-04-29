<?php

namespace TapPayments\Requests;

/**
 * Trait for creatable resources. Adds a `create()` static method to the class.
 *
 * This trait should only be applied to classes that derive from GoSellObjects.
 */
trait Verify
{
    public static function verify($params = null, $options = null)
    {
        self::_validateKey();
        self::_validateParams('POST', $params);
        $url = static::baseUrl() . static::classUrl() . '/verify';

        return static::_staticRequest('POST', $url, $params, $options);
    }
}
