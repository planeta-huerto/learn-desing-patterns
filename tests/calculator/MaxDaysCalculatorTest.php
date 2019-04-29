<?php
namespace Tests\calculator;

use Exception;
use Patterns\calculator\Cart;
use Patterns\calculator\MaxDaysCalculator;
use Patterns\calculator\Product;
use PHPUnit\Framework\TestCase;

class MaxDaysCalculatorTest extends TestCase
{
    public function valuesProvider()
    {
        return [
            [
                [
                    new Product("123456",'Producto prueba 1',3,11),
                    new Product("123457",'Producto prueba 2',4,7),
                    new Product("123458",'Producto prueba 3',7,2),
                    new Product("123459",'Producto prueba 4',2,1)
                ], 7
            ]
        ];
    }

    /**
     * @test
     * @dataProvider valuesProvider
     * @param $products
     * @param $maxDay
     */
    public function given_cart_items_when_withMaxDays_then_return_max_day_available($products,$maxDay)
    {
        $cartItems = $products;

        $cart = new Cart($cartItems);

        $maxDaysCalculator = new MaxDaysCalculator($cart);
        $result = $maxDaysCalculator->withMaxDays();

        $this->assertSame($result,$maxDay);
    }

    /**
     * @test
     */
    public function given_empty_cart_item_when_withMaxDays_then_return_exception()
    {
        $this->expectException(Exception::class);
        $cart = new Cart();
        $maxDaysCalculator = new MaxDaysCalculator($cart);
        $maxDaysCalculator->withMaxDays();
    }
}



