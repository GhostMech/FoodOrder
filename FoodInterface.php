<?php
namespace GMH;

interface FoodInterface
{
    /**
     * Get the Food item's name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the Food item's price.
     *
     * @return float
     */
    public function getPrice();
}
