<?php

namespace Tests\specification;

use Patterns\specification\Item;
use Patterns\specification\OrSpecification;
use Patterns\specification\PriceSpecification;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    /**
     * @test
     */
    public function given_specifications_price_and_item_when_is_satisfied_by_than_return_false()
    {
        $specificationPrice = new PriceSpecification(50,90);
        $specificationPriceOther = new PriceSpecification(101,200);

        $orSpecification = new OrSpecification($specificationPrice,$specificationPriceOther);

        $this->assertFalse($orSpecification->isSatisfiedBy(new Item(100)));
    }

    /**
     * @test
     */
    public function given_specifications_price_and_item_when_is_satisfied_by_than_return_true()
    {
        $specificationPrice = new PriceSpecification(50,90);
        $specificationPriceOther = new PriceSpecification(101,200);

        $orSpecification = new OrSpecification($specificationPrice,$specificationPriceOther);

        $this->assertTrue($orSpecification->isSatisfiedBy(new Item(102)));
    }
}