<?php

require_once '../libraries/cart.lib.php';
require_once '../libraries/config.lib.php';
require_once '../libraries/database.lib.php';
require_once '../libraries/form.lib.php';
require_once '../libraries/hash.lib.php';
require_once '../libraries/login.lib.php';
require_once '../libraries/model.lib.php';
require_once '../libraries/admin.lib.php';
require_once '../libraries/customer.lib.php';
require_once '../models/category.collection.php';
require_once '../models/product_list.collection.php';

//Protects the page so can only be seen when you are logged in as admin
Login::kickout();

# $product will let us access tb_products in db
$product = new Model('tb_products');

# store the string 'category_id' from the url inside $cat
$cat = $_GET['category_id'];

# if the url has a string of 'product_id' (therefore we are looking at an existing product)
if($_GET['product_id']){

	# load all info of the existing product_id from the db
	$product->load($_GET['product_id']);

	#store that product's image and thumbnail into variables so they can be displayed
	$image = $product->image;
	$thumbnail = $product->thumbnail;
	
	#show the title as 'Edit Product'
	$title = 'Edit Product';
}
# otherwise then 'product_id' is not in the url, so we want to create a new product
else{
	# so create the correct form options
	$title = 'Create Product';
	$image = 'assets/img/';
	$thumbnail = 'assets/img/small_';
}

#If the form was just posted
if($_POST){

	# Load all the new posted information into $product
	$product->name = $_POST['name'];
	$product->description = $_POST['description'];
	$product->price = $_POST['price'];
	$product->image = $_POST['image'];
	$product->thumbnail = $_POST['thumbnail'];
	$product->category_id = $cat;
	$product->save();

	# refresh the page with the new and correct ids added to the url (refreshes page)
	header("location: add_product.php?product_id=$product->id&category_id=$cat");
	exit;
}

include '../views/header.php';
include '../views/navigation.php';
include '../views/edit_product.php';
include '../views/footer.php';