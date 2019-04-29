<?php
namespace Patterns\calculator;


interface CartInterface
{
    public function count():int;
    public function items():array;
}