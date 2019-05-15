<?php

namespace Test\Factory;

use Patterns\Factory\CheesePizza;
use Patterns\Factory\PizzaFactory;
use Patterns\Factory\PizzaType;
use PHPUnit\Framework\TestCase;

class PizzaFactoryTest extends TestCase
{
    /**
     * @var PizzaFactory
     */
    protected $factory;

    protected function setUp(): void
    {
        $this->factory = new PizzaFactory();
    }

    /**
     * @test
     */
    public function it_return_cheese_pizza()
    {
        $pizza = $this->factory->createByType(PizzaType::CHEESE);
        $this->assertEquals(CheesePizza::create(), $pizza);
    }

    /**
     * @test
     */
    public function it_return_exception_when_type_not_exist()
    {
        $this->expectException(\Exception::class);
        $this->factory->createByType("notexists");
    }
}