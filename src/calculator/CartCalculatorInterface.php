<?php
namespace Patterns\calculator;


interface CartCalculatorInterface
{
    /**
     * @param CartItemInterface $cartItem
     * @return mixed
     */
    public function calculate(CartItemInterface $cartItem);
}