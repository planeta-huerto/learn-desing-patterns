<?php

namespace Patterns\calculator;

class Cart implements CartInterface
{
    /** @var int  */
    private $count;
   /** @var array  */
    private $items;

    /**
     * Cart constructor.
     * @param array|null $cartItem
     */
    public function __construct( array $cartItem = null)
    {
        $this->items = $cartItem ?: [];
    }

    public function count() : int
    {
        return $this->count;
    }

    public function items() : array
    {
        return $this->items;
    }
}