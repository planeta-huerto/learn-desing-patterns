<?php

namespace Patterns\Builder;

use Exception;

class TaxBuilder
{

    private $validsCountryIsos;

    /**
     * TaxBuilder constructor.
     * @param array $countries
     */
    public function __construct(array $countries)
    {
        $this->validsCountryIsos = $countries;
    }


    /**
     * @param string $countryIso
     * @return TaxInterface
     * @throws Exception
     */
    public function build(string $countryIso): TaxInterface
    {
        if($this->valid($countryIso)) {
            return Tax::createByIso($countryIso);
        }

        throw new Exception("Not valid countryIso: ". $countryIso);
    }

    private function valid(string $countryIso)
    {
        return in_array($countryIso, $this->validsCountryIsos);
    }

}