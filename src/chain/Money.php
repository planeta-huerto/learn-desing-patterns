<?php

namespace Patterns\Chain;

class Money
{
    protected $value;

    /**
     * Money constructor.
     * @param $value
     */
    private function __construct(int $value)
    {
        $this->value = $value;
    }


    public static function create(int $value): self
    {
        return new self($value);
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

}