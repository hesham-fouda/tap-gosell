<?php
/**GoSell Base Class*/

namespace TapPayments;

class GoSell
{
    /**
     * @var ?string
     */
    public static ?string $privateKey;

    public static function setPrivateKey($key)
    {
        self::$privateKey = $key;
    }
}
