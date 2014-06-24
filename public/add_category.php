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

$category = new Model('tb_categories');

if($_GET['category_id']){
	$category->load($_GET['category_id']);
	
	$title = 'Edit Category';
}
else{
	$title = 'Create Category';
}

#If the form was just posted
if($_POST){

	$category->name = $_POST['name'];
	$category->save();
	header("location: add_category.php?category_id=$category->id");
	exit;
}

include '../views/header.php';
include '../views/navigation.php';
include '../views/edit_category.php';
include '../views/footer.php';