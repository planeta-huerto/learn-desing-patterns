<?php

namespace Patterns\Factory;

class CheesePizza implements PizzaInterface
{

    /**
     * CheesePizza constructor.
     */
    private function __construct()
    {

    }

    /**
     * @return CheesePizza
     */
    public static function create(): PizzaInterface
    {
        return new self();
    }
}