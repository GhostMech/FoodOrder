<?php
namespace GMH;

require_once 'Food.php';

use Exception;
use PDO;

class Order
{
    protected $items = [];
    protected $discount;
    protected $tax;

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
     * @return object $removedItem
     */
    public function removeItem($id)
    {
        $removedItem = $this->items[$id];
        unset($this->items[$id]);
        return $removedItem;
    }

    /**
     * Set the discount rate of the order. Returns the object for chaining.
     *
     * @param mixed $discount
     * @return \GMH\Order
     */
    public function discount($discount = null)
    {
        if (is_numeric($discount)) {
            $this->discount = $discount/100;
        }
        return $this;
    }

    /**
     * Set the tax rate of the order. Returns the object for chaining.
     *
     * @param mixed $tax
     * @return \GMH\Order
     */
    public function tax($tax = null)
    {
        if (is_numeric($tax)) {
            $this->tax = $tax/100;
        }
        return $this;
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
     * Get the discount rate.
     *
     * @return float
     */
    public function discountRate()
    {
        return $this->discount;
    }

    /**
     * Get the tax rate.
     *
     * @return float
     */
    public function taxRate()
    {
        return $this->tax;
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
     * Gets the order total after the discount is applied.
     *
     * @return float
     */
    public function discountedTotal()
    {
        return $this->rawTotal() - ($this->rawTotal() * $this->discount);
    }

    /**
     * Get the order total, after the discount and tax are applied.
     *
     * @return float
     */
    public function totalWithTax()
    {
        $total = $this->rawTotal();
        $discountedTotal = $total - ($total * $this->discount);
        $totalWithTax = $discountedTotal * (1 + $this->tax); 

        return $totalWithTax;
    }
}
