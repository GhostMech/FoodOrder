<?php
namespace GMH;

require_once 'Food.php';

use Exception;
use PDO;

class Order
{
    protected $items = [];

    /**
     * Class constructor: not used
     */
    public function __construct()
    {
        //
    }

    /**
     * Add an item to the order.
     *
     * @param FoodInterface $item
     * @return \GMH\Order
     */
    public function addItem(FoodInterface $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * Removes an item from the order.
     *
     * @param int $id
     * @return $removedItem
     */
    public function removeItem($id)
    {
        // TODO
        // return $removedItem;
    }

    /**
     * Gets the raw total, before discount and tax.
     *
     * @return float
     */
    public function rawTotal()
    {
        $rawTotal = 0.00;
        foreach ($this->items as $item) {
            $rawTotal += $item->getPrice();
        }
        return $rawTotal;
    }

    /**
     * Get all of the items in the order.
     *
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Get the names of all of the order items.
     *
     * @return array
     */
    public function getNames()
    {
        $allItems = [];
        foreach ($this->items as $item) {
            $allItems[] = $item->getName();
        }
        return $allItems;
    }

    /**
     * Get the prices of all of the order items.
     *
     * @return array
     */
    public function getPrices()
    {
        $allPrices = [];
        foreach ($this->items as $item) {
            $allPrices[] = $item->getPrice();
        }
        return $allPrices;
    }
    
    /**
     * Get a multi-array of the name and price of every item.
     *
     * @return array
     */
    public function getAllNamesAndPrices()
    {
        $allNamesAndPrices = [];
        foreach ($this->items as $key => $item) {
            $allNamesAndPrices[$key]['name'] = $item->getName();
            $allNamesAndPrices[$key]['price'] = $item->getPrice();
        }
        return $allNamesAndPrices;
    }
}