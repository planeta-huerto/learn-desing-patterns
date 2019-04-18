<?php

namespace Patterns\Builder;

class Tax implements TaxInterface
{

    protected $country;

    /**
     * Tax constructor.
     * @param $country
     */
    private function __construct($country)
    {
        $this->country = $country;
    }


    public static function createByIso(string $countryIso): TaxInterface
    {
        return new self($countryIso);
    }
}