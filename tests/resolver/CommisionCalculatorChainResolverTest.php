<?php
namespace Tests\Resolver;

use Patterns\resolver\CommissionCalculatorChainResolver;
use Patterns\resolver\MoneyCommissionContextInterface;
use Patterns\resolver\MoneyCommissionFirstResolver;
use Patterns\resolver\MoneyCommissionSecondResolver;
use PHPUnit\Framework\TestCase;

class CommisionCalculatorChainResolverTest extends TestCase
{

    public function valuesProvider()
    {
        return [
            [10,'20%'],
            [20,'30%'],
            [0,'0%'],
            [11,'20%']
        ];
    }

    /**
     * @test
     * @dataProvider valuesProvider
     * @param $value
     * @param $percentage
     */
    public function given_value_when_apply_chain_resolver_then_return_percentage_in_string($value,$percentage)
    {
        $chainResolver = new CommissionCalculatorChainResolver([
            new MoneyCommissionFirstResolver(),
            new MoneyCommissionSecondResolver()
        ]);

        $result = $chainResolver->apply(new MoneyCommissionContextInterfaceMock($value));
        $this->assertSame($result,$percentage);
    }

}


class MoneyCommissionContextInterfaceMock implements MoneyCommissionContextInterface
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