<?php

namespace Tests;

use TapPayments\GoSell;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ?string
     */
    public static ?string $id = null;

    public function __construct()
    {
        parent::__construct();
        if (file_exists(dirname(__DIR__) . '/.env'))
            (new DotEnv(dirname(__DIR__) . '/.env'))->load();
        GoSell::setPrivateKey(getenv('TAP_API_KEY') ?? "sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");
    }
}