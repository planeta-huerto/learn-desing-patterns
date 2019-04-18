<?php

namespace Test\Builder;

use Exception;
use Patterns\Builder\Tax;
use Patterns\Builder\TaxBuilder;
use PHPUnit\Framework\TestCase;

class TaxBuilderTest extends TestCase
{

    /**
     * @test
     */
    public function it_throw_exception_if_country_is_not_valid()
    {
        $this->expectException(Exception::class);
        $builder = new TaxBuilder([]);

        $builder->build('');
    }

    /**
     * @test
     */
    public function it_return_tax_from_country()
    {
        $builder = new TaxBuilder(['es', 'pt']);

        $tax = $builder->build('es');
        $this->assertEquals($tax, Tax::createByIso('es'));
    }

}