<?php

namespace Patterns\resolver;

interface MoneyCommissionCalculatorInterface
{
    /**
     * @param MoneyCommissionContextInterface $context
     * @return bool
     */
    public function supports(MoneyCommissionContextInterface $context): bool;

    /**
     * @param MoneyCommissionContextInterface $context
     * @return string
     */
    public function apply(MoneyCommissionContextInterface $context): string;
}