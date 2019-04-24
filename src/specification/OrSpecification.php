<?php

namespace Patterns\specification;


class OrSpecification implements SpecificationInterface
{
    /**
     * @var SpecificationInterface[]
     */
    private $specifications;

    /**
     * @param SpecificationInterface[]
     */
    public function __construct(SpecificationInterface ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(Item $item): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($item)) {
                return true;
            }
        }
        return false;
    }
}