<?php

namespace Tests;

use TapPayments\GoSell;

class ChargesTest extends TestCase
{
    public function testCreate()
    {

        $charge_created = GoSell\Charges::create([
            "amount" => 1,
            "currency" => "SAR",
            "threeDSecure" => true,
            "save_card" => false,
            "description" => "Test Description",
            "statement_descriptor" => "Sample",
            "metadata" => [
                "udf1" => "test 1",
                "udf2" => "test 2"
            ],
            "reference" => [
                "transaction" => "txn_0001",
                "order" => "ord_0001"
            ],
            "receipt" => [
                "email" => false,
                "sms" => true
            ],
            "customer" => [
                "first_name" => "test",
                "middle_name" => "test",
                "last_name" => "test",
                "email" => getenv('TEST_MAIL') ?? "test@test.com",
                "phone" => [
                    "country_code" => getenv('TEST_PHONE_COUNTRY_CODE') ?? "965",
                    "number" => getenv('TEST_PHONE_NUMBER') ?? "50000000"
                ]
            ],
            "source" => [
                "id" => "src_all"
            ],
            "post" => [
                "url" => "http://your_website.com/post_url"
            ],
            "redirect" => [
                "url" => "http://your_website.com/redirect_url"
            ]
        ]);
        self::$id = $charge_created->id;
        $this->assertEquals(
            $charge_created->object,
            'charge'
        );
    }

    public function testRetrieve()
    {
        $charge_retrieved = GoSell\Charges::retrieve(self::$id);
        $this->assertEquals(
            $charge_retrieved->id,
            self::$id
        );
    }

    public function testUpdate()
    {
        $updated_charge = GoSell\Charges::update(self::$id, [
            "description" => "test description",
            "receipt" => [
                "email" => false,
                "sms" => true
            ],
            "metadata" => [
                "udf2" => "testing update"
            ]
        ]);
        $this->assertEquals(
            $updated_charge->metadata->udf2,
            "testing update"
        );

        $this->assertEquals(
            $updated_charge->description,
            "test description"
        );
    }

    public function testDelete()
    {
        GoSell\Charges::delete(self::$id);
    }
}