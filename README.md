# FoodOrder #
Testing ground for the Food and Order classes.

### Food Class ###
This class represents a Food item, and implements the FoodInterface interface. It uses these methods:
* **name()**
* **price()**
* **getName()**  (Accessor from the FoodInterface interface)
* **getPrice()**  (also from the FoodInterface interface)

### Order Class ###
This class represents an Order object, composed of Food objects. It uses these methods:

* **addItem()**
* **removeItem()**
* **getItems()** (returns an array of Food objects)
* **getNames()**
* **getPrices()**
* **getAllNamesAndPrices()**
* **rawTotal()**
