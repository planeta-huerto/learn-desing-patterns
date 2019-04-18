<?php

namespace Patterns\Chain;

interface CommissionCalculatorInterface
{
    /**
     * @param CommissionContextInterface $context
     * @return bool
     */
    public function supports(CommissionContextInterface $context): bool;

    /**
     * @param CommissionContextInterface $context
     * @return Money
     */
    public function calculate(CommissionContextInterface $context): Money;
}