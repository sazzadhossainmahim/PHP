<!-- <?php

// include functions.php
function calculateShipping($productWeight, $pricePerKilogram){
        return $productWeight * $pricePerKilogram;
}



// $products = $_SESSION['products'];
$products[1]['weight'] = 1;
$products[1]['price'] = 10;

$pricePerKilogram = 5;

$totalShippingPrice = 0;

foreach($products as $product){
    $totalShippingPrice = calculateShipping($product['weight'], $pricePerKilogram);
}

echo $totalShippingPrice;

?> -->

<!-- with object  -->

<?php


    class Product{
        private $price;
        private $weight;

        public function __construct($price, $weight)
        {
            $this->weight = $weight;
            $this->price = $price;
        }

        function getWeight() {
            return $this->weight;
        }
    }
// shipping
class Shipping{
    private $totalShippingPrice;

    
}
    $product = new Product(3,1);

    var_dump($product);

    var_dump($product);

?>