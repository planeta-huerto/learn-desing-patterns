<?php

namespace Patterns\Chain;


use Exception;

class CommissionCalculatorChain
{

    /** @var array  */
    private $calculators;

    /**
     * CommissionCalculatorChain constructor.
     * @param $calculators
     */
    public function __construct(array $calculators)
    {
        $this->calculators = $calculators;
    }


    public function supports(CommissionContextInterface $context)
    {
        return true;
    }

    /**
     * @inheritdoc
     * @throws Exception
     */
    public function calculate(CommissionContextInterface $context)
    {
        foreach ($this->calculators as $calculator) {
            /** @var $calculator CommissionCalculatorInterface */
            if($calculator->supports($context)) {
                return $calculator->calculate($context);
            }
        }

        throw new Exception("Payment not found");
    }

}