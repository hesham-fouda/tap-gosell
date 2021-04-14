<?php

namespace Tests;

use TapPayments\GoSell;

class CustomersTest extends TestCase
{
    public function testCreate()
    {
        $customer_created = GoSell\Customers::create([
            "first_name" => "test",
            "middle_name" => "test",
            "last_name" => "test",
            "email" => getenv('TEST_MAIL') ?? "test@test.com",
            "phone" => [
                "country_code" => getenv('TEST_PHONE_COUNTRY_CODE') ?? "965",
                "number" => getenv('TEST_PHONE_NUMBER') ?? "50000000"
            ],
            "description" => "test",
            "metadata" => [
                "udf1" => "test"
            ],
            "currency" => "SAR"
        ]);
        self::$id = $customer_created->id;
        $this->assertEquals(
            $customer_created->object,
            'customer'
        );
    }

    public function testRetrieve()
    {
        $retrieved_customer = GoSell\Customers::retrieve(self::$id);
        $this->assertEquals(
            $retrieved_customer->id,
            self::$id
        );
    }

    public function testUpdate()
    {
        $updated_customer = GoSell\Customers::update(self::$id, [
            "first_name" => "test",
            "middle_name" => "test",
            "last_name" => "test",
            "email" => "test@test.com",
            "phone" => [
                "country_code" => "965",
                "number" => "00000000"
            ],
            "description" => "test description",
            "metadata" => [
                "udf1" => "test update"
            ],
            "currency" => "SAR"
        ]);
        $this->assertEquals(
            $updated_customer->metadata->udf1,
            "test update"
        );

        $this->assertEquals(
            $updated_customer->description,
            "test description"
        );

    }

    public function testDelete()
    {

        $deleted_customer = GoSell\Customers::delete(self::$id);

        $this->assertEquals(
            $deleted_customer->deleted,
            true
        );

        $this->assertEquals(
            $deleted_customer->id,
            self::$id
        );

    }
}