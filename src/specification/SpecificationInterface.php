<?php

namespace Patterns\specification;


interface SpecificationInterface
{
    public function isSatisfiedBy(Item $item): bool;
}