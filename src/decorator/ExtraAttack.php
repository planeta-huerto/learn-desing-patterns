<?php

namespace Patterns\decorator;


class ExtraAttack extends SwordDecorator
{
    public function attack()
    {
        return $this->sword->attack() * 2;
    }

    public function defense()
    {
        return $this->sword->defense();
    }
}