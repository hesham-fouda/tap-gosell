<?php

namespace Tests;

use TapPayments\GoSell;

class CardTest extends TestCase
{
    public function testVerify()
    {
        $authorize_created = GoSell\Card::verify([
            "currency" => "SAR",
            "threeDSecure" => true,
            "save_card" => true,
            "metadata" => [
                "udf1" => "test"
            ],
            "customer" => [
                "id" => "test",
            ],
            "source" => [
                "id" => "src_all"
            ],
            "auto" => [
                "type" => "VOID",
                "time" => 100
            ],
            "redirect" => [
                "url" => "http://f750c23bb45b.ngrok.io/returnurl"
            ]
        ]);
        self::$id = $authorize_created->id;
        $this->assertEquals(
            $authorize_created->object,
            'authorize'
        );
    }

    public function testRetrieve()
    {
        $authorize_retrieved = GoSell\Authorize::retrieve(self::$id);
        $this->assertEquals(
            $authorize_retrieved->id,
            self::$id
        );
    }

    public function testVoid()
    {
        GoSell\Authorize::void(self::$id);
    }

    public function testUpdate()
    {
        $updated_authorize = GoSell\Authorize::update(self::$id, [
            "description" => "test description",
            "receipt" => [
                "email" => false,
                "sms" => false
            ],
            "metadata" => [
                "udf2" => "test update"
            ]
        ]);
        $this->assertEquals(
            $updated_authorize->metadata->udf2,
            "test update"
        );

        $this->assertEquals(
            $updated_authorize->description,
            "test description"
        );
    }
}