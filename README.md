# FoodOrder #
Testing ground for the Food and Order classes.

### Food Class ###
This class implements the FoodInterface interface. It uses these methods:
* **name()**
* **price()**
* **getName()**  (Accessor from the FoodInterface interface)
* **getPrice()**  (also from the FoodInterface interface)

### Order Class ###
This class is composed of Food objects. It uses these methods:

* **addItem()**
* **removeItem()**
* **getItems()** (returns an array of Food objects)
* **getNames()**
* **getPrices()**
* **getAllNamesAndPrices()**
* **rawTotal()**

#### Here is an example using the Order class: ####
```php
<?php
namespace GMH;

// Require the Order class
require_once 'Order.php';

$order = new Order();

// Use method chaining
$fries = new Food();
$fries->name("French Fries")->price('3.50');
$pizza = new Food();
$pizza->name('Pepperoni Pizza')->price('11.95');

$order->addItem($fries)->addItem($pizza);

// Raw Total:
echo $order->rawTotal();

// Set a discount and a tax rate
$order->discount(10)->tax(8);

// Get the total after discount and tax
echo $order->totalWithTax();

?>
