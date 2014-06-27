<?php

require_once '../libraries/cart.lib.php';

# get the product id where the url has 'id'
$product_id = $_GET['id'];

# remove that product from the cart
Cart::remove_product($product_id);

header('location: '.$_SERVER['HTTP_REFERER']);
exit;