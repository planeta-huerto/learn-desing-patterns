<?php
namespace Patterns\calculator;


interface CartItemInterface
{
    public function maxDaysAvailable() : Days;
}