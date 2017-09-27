<?php
namespace GMH;

require 'FoodInterface.php';

use Exception;

class Food implements FoodInterface
{
    /**
     * The name of the item
     *
     * @var string
     */
    protected $name;

    /**
     * The price of the item.
     *
     * @var float
     */
    protected $price;

    /**
     * Sets the name of the item. Returns the object for chaining.
     *
     * @param string $name
     * @return \GMH\Food
     */
    public function name($name)
    {
        if (is_string($name)) {
            $name = trim($name);
            $this->name = $name;
        }
        return $this;
    }

    /**
     * Sets the price of the item. Returns the object for chaining.
     *
     * @param mixed $price
     * @return void
     */
    public function price($price)
    {
        if (is_numeric($price)) {
            $this->price = (float)$price;
        }
        return $this;
    }

    /**
     * Returns the name of the item.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the price of the item.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
