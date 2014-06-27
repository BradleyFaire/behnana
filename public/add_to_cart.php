<?php

require_once '../libraries/cart.lib.php';

# store the id and quantity that were just submitted into the correct variables
$product_id = $_POST['id'];
$quantity = $_POST['quantity'];

# add the product's id and quantity into the cart
Cart::add_product($product_id, $quantity);

header('location: '.$_SERVER['HTTP_REFERER']);
exit;