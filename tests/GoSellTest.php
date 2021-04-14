<?php

namespace Tests;

use TapPayments\GoSell;
use \TapPayments\Requests\Common;

class GoSellTest extends TestCase
{
    public function testSetPrivateKey()
    {
        $this->assertEquals(
            GoSell::$privateKey,
            getenv('TAP_API_KEY') ?? "sk_test_XKokBfNWv6FIYuTMg5sLPjhJ"
        );
    }

    public function testCommon()
    {
        Common::testingTrait();
    }
}