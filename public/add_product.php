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

Login::kickout();

$form = new Form();

$product = new Model('tb_products');

$cat = $_GET['category_id'];

if($_GET['product_id']){

	$product->load($_GET['product_id']);

	$image = $product->image;
	$thumbnail = $product->thumbnail;
	
	$title = 'Edit Product';
}
else{
	$title = 'Create Product';
	$image = 'assets/img/';
	$thumbnail = 'assets/img/small_';
}

#If the form was just posted
if($_POST){

	$product->name = $_POST['name'];
	$product->description = $_POST['description'];
	$product->price = $_POST['price'];
	$product->image = $_POST['image'];
	$product->thumbnail = $_POST['thumbnail'];
	$product->category_id = $cat;
	$product->save();
	header("location: add_product.php?product_id=$product->id&category_id=$cat");
	exit;
}

include '../views/header.php';
include '../views/navigation.php';
include '../views/edit_product.php';
include '../views/footer.php';