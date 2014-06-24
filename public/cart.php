<?php

require_once '../libraries/cart.lib.php';
require_once '../libraries/config.lib.php';
require_once '../libraries/database.lib.php';
require_once '../libraries/form.lib.php';
require_once '../libraries/hash.lib.php';
require_once '../libraries/login.lib.php';
require_once '../libraries/model.lib.php';
require_once '../models/product_list.collection.php';
require_once '../models/category.collection.php';

#creates an empty array that will filled with the information collected by the loop.
$cart_products = array();

#sets a value to 0 that will add up all the totals for each product being ordered.
$grand_total = 0;

#Runs a loop for each product in the cart. It takes both the ID and the Quantity of the products being ordered in the cart to collect appropriate information from the database.
foreach($_SESSION['cart'] as $id => $qty){

	#creates a variable called $product that is from the Model.lib.php, using tb_products as the database to access.
	$product = new Model('tb_products');

	#This loads all the information in the database associated to the $id of the product in this particular run of the loop (eg. name, image, thumbnail, description, etc..) and stored that information as an array that can now be accessed as $products->$key
	$product->load($id);

	#This creates a variable called $total_price that calculates the price of the product times the quantity.
	$total_price = $qty * $product->price;

	#This creates a variable called grand_total that calculates a running total of al the total_prices of each product's quantity, and will be completed at the end of the loop.
	$grand_total += $total_price;

	#This creates an array with the information that will be used in the table for display to the user. The array includes some information taken directly from the database, as well as information that was calculated during the loop.
	$cart_products[] = array(
		'image'       => $product->thumbnail,
		'total_price' => $total_price,
		'price'       => $product->price,
		'quantity'    => $qty,
		'name'        => $product->name,
		'id'          => $product->id
	);
}

include '../views/header.php';
include '../views/navigation.php';
include '../views/cart_table.php';
include '../views/footer.php';