<?php

namespace Test\Chain;

use Exception;
use Patterns\Chain\CommissionCalculatorChain;
use Patterns\Chain\CommissionCalculatorInterface;
use Patterns\Chain\CommissionContextInterface;
use Patterns\Chain\Money;
use PHPUnit\Framework\TestCase;

class CommissionCalculatorChainTest extends TestCase
{

    /**
     * @test
     */
    public function it_throw_exception_if_not_support()
    {
        $this->expectException(Exception::class);
        $chain = new CommissionCalculatorChain([]);
        $chain->calculate(new CommissionContextInterfaceMock(0));
    }


    /**
     * @test
     */
    public function if_support_and_calculate_only_one_then_return_money()
    {
        $moneyValue = 5;
        $chain = new CommissionCalculatorChain([new CommissionCalculatorMock()]);
        $money = $chain->calculate(new CommissionContextInterfaceMock($moneyValue));

        $this->assertEquals($money, Money::create($moneyValue));
        $this->assertEquals($moneyValue, $money->value());
    }

    /**
     * @test
     */
    public function if_support_only_one_and_calculate_only_one_then_return_money()
    {
        $moneyValue = 5;
        $chain = new CommissionCalculatorChain([new CommissionNotSupportCalculatorMock(), new CommissionCalculatorMock()]);
        $money = $chain->calculate(new CommissionContextInterfaceMock($moneyValue));

        $this->assertEquals($money, Money::create($moneyValue));
        $this->assertEquals($moneyValue, $money->value());
    }
}

class CommissionCalculatorMock implements CommissionCalculatorInterface
{

    public function supports(CommissionContextInterface $context): bool
    {
        return true;
    }

    public function calculate(CommissionContextInterface $context): Money
    {
        return Money::create($context->value());
    }
}

class CommissionNotSupportCalculatorMock extends CommissionCalculatorMock
{
    public function supports(CommissionContextInterface $context): bool
    {
        return false;
    }
}

class CommissionContextInterfaceMock implements CommissionContextInterface
{
    /** @var int  */
    private $value;

    /**
     * CommissionContextInterfaceMock constructor.
     * @param $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }


    public function value(): int
    {
        return $this->value;
    }
}