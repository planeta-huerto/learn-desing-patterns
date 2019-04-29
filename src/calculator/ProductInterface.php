<?php

namespace Patterns\calculator;


interface ProductInterface
{
    public function sku();
    public function units();
    public function name();
    public function maxDaysAvailable();
}