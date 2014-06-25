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

#Protects the page so only admin can see
Login::kickout();

#Creates new instance based on the form library (brad can you expalin this more?)
$form = new Form();

#Establishing tb_categories table
# This will allow tb_categories to use any function that we have set within the Model Library.
$category = new Model('tb_categories');

#If the string "category_id" is found in the url (which would happen if we clicked on a category that exists in the database.)
if($_GET['category_id']){
	//$category then accesses the model library to perform the 'Load' function which will then find everything associated with that id.
	$category->load($_GET['category_id']);
	//title of the page becomes 'Edit Category'
	$title = 'Edit Category';
}
else{
	//If the id is not found in the url 'Create category' 
	$title = 'Create Category';
}

#If the form was just posted
if($_POST){
	//
	$category->name = $_POST['name'];
	//Saves the category
	$category->save();
	//Redirects us to the page where we just added the new category
	header("location: add_category.php?category_id=$category->id");
	exit;
}

include '../views/header.php';
include '../views/navigation.php';
include '../views/edit_category.php';
include '../views/footer.php';