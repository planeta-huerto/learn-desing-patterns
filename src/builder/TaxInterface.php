<?php

namespace Patterns\Builder;

interface TaxInterface
{
    public static function createByIso(string $countryIso): TaxInterface;
}