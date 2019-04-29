<?php

namespace Patterns\calculator;

class Days
{
    private $value;

    private function __construct($value)
    {
        $this->value = $value;
    }

    public function value(){
        return $this->value;
    }

    public static function create(int $number)
    {
        return new static($number);
    }

    public static function createFromString(string $number)
    {
        return new static((int)$number);
    }

}