<?php

namespace Patterns\decorator;


abstract class SwordDecorator implements WeaponInterface
{
    protected $sword;

    public function __construct(WeaponInterface $sword)
    {
        $this->sword = $sword;
    }
}