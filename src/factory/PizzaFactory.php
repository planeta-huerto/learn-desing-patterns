<?php

namespace Patterns\Factory;

use Exception;

class PizzaFactory
{
    /** @var array */
    private $pizzasRepository;

    public function __construct()
    {
        $this->pizzasRepository = [
            PizzaType::CHEESE => CheesePizza::class
        ];
    }


    /**
     * @param string $pizzaType
     * @return PizzaInterface
     * @throws Exception
     */
    public function createByType(string $pizzaType): PizzaInterface
    {
        if (!isset($this->pizzasRepository[$pizzaType])) {
            throw new Exception('Not found pizza type: ' . $pizzaType);
        }

        return $this->pizzasRepository[$pizzaType]::create();

    }

}