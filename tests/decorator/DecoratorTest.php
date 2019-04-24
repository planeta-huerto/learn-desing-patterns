<?php

namespace Tests\decorator;


use Patterns\decorator\ExtraAttack;
use Patterns\decorator\Sword;
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    /**
     * @test
     */
    public function given_object_sword_when_create_object_extra_attack_then_return_attack_with_more_attack()
    {
        $sword = new ExtraAttack(new Sword(20,20));
        $this->assertSame($sword->attack(),40);
        $this->assertSame($sword->defense(),20);
    }
}