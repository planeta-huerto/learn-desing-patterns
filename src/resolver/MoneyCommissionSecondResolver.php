<?php
namespace Patterns\resolver;


class MoneyCommissionSecondResolver implements MoneyCommissionCalculatorInterface
{

    /**
     * @param MoneyCommissionContextInterface $context
     * @return bool
     */
    public function supports(MoneyCommissionContextInterface $context): bool
    {
        if($context->value() >= 20) {
            return true;
        }

        return false;
    }

    /**
     * @param MoneyCommissionContextInterface $context
     * @return string
     */
    public function apply(MoneyCommissionContextInterface $context): string
    {
        return '30%';
    }
}