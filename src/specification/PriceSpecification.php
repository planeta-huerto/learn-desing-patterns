<?php
namespace Patterns\specification;


class PriceSpecification implements SpecificationInterface
{
    /** @var float  */
    private $maxPrice;

    /** @var float  */
    private $minPrice;

    public function __construct(float $minPrice, float $maxPrice)
    {
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
    }

    public function isSatisfiedBy(Item $item): bool
    {
        if ($this->maxPrice !== null && $item->getPrice() > $this->maxPrice) {
            return false;
        }

        if ($this->minPrice !== null && $item->getPrice() < $this->minPrice) {
            return false;
        }

        return true;
    }
}