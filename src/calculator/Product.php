<?php
namespace Patterns\calculator;

class Product implements CartItemInterface
{
    private $sku;
    private $name;
    private $maxDaysAvailable;
    private $units;

    public function __construct(string $sku,string $name,int $maxDaysAvailable,int $units)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->maxDaysAvailable = $maxDaysAvailable;
        $this->units = $units;
    }

    /**
     * @return string
     */
    public function sku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function units(): int
    {
        return $this->units;
    }

    public function maxDaysAvailable(): Days
    {
        return Days::create($this->maxDaysAvailable);
    }
}