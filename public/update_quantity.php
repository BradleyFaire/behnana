<?php

require_once '../libraries/cart.lib.php';

# update the product_id and quantity with the newly posted numbers
$product_id = $_POST['id'];
$quantity = $_POST['quantity'];

# set the new quantity of this product id in the cart
Cart::set_quantity($product_id, $quantity);

header('location: '.$_SERVER['HTTP_REFERER']);
exit;