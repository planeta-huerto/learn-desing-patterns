<?php

namespace Patterns\resolver;


class CommissionCalculatorChainResolver
{

    /** @var array  */
    private $resolvers;

    /**
     * CommissionCalculatorChainResolver constructor.
     * @param array $resolvers
     */
    public function __construct(array $resolvers)
    {
        $this->resolvers = $resolvers;
    }


    public function supports(MoneyCommissionContextInterface $context): bool
    {
        return true;
    }

    /**
     * @param MoneyCommissionContextInterface $context
     * @return string
     */
    public function apply(MoneyCommissionContextInterface $context): string
    {
        $percentage = '0%';

        foreach ($this->resolvers as $resolver) {
            /** @var $resolver MoneyCommissionCalculatorInterface */
            if($resolver->supports($context)) {
                $percentage = $resolver->apply($context);
            }
        }

        return $percentage;
    }
}