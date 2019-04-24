<?php

namespace Patterns\decorator;

class Sword implements WeaponInterface
{
    private $armor;
    private $attack;

    public function __construct(int $armor,int $attack)
    {
        $this->armor = $armor;
        $this->attack = $attack;
    }

    public function attack()
    {
        return $this->attack;
    }

    public function defense()
    {
        return $this->armor;
    }
}