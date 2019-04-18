<?php

namespace Patterns\Factory;

interface PizzaInterface
{
    public static function create(): PizzaInterface;
}