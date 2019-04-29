<?php

namespace Patterns\calculator;


class MaxDaysCalculator implements CartCalculatorInterface
{
    /** @var int  */
    private $maxDays;
    /** @var CartInterface $cart */
    private $cart;

    public function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
        $this->maxDays = 0;
    }

    public function calculate(CartItemInterface $cartItem)
    {
        $days = $cartItem->maxDaysAvailable();
        $dayValue = $days->value();
        $maxDays = $this->maxDays;

        if($dayValue > $maxDays)
        {
            $this->maxDays = $dayValue;
        }
    }

    public function withMaxDays() : int
    {
        $cartItems = $this->cart->items();

        if(empty($cartItems)){
            throw new \InvalidArgumentException('The cart is empty');
        }

        foreach ($cartItems as $item)
        {
            $this->calculate($item);
        }

        return $this->maxDays;
    }
}