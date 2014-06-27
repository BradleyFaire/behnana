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

if($_POST){

	# create a new admin
	$admin = new Admin();

	# store the posted username and password into $admin
	$admin->username = $_POST['username'];
	$admin->password = $_POST['password'];

	# create a new customer
	$customer = new Customer();

	# store the posted username and password into $customer
	$customer->username = $_POST['username'];
	$customer->password = $_POST['password'];

	# if they pass the admin authentication
	if($admin->authenticate()){
		#then log them in as an admin
		Login::admin_log_in();
		# and take them into the index
		header('location: index.php');
		exit;
	# or if they pass the customer authentication
	}else if($customer->authenticate()){
		# then log them in as a customer
		Login::customer_log_in();
		# and take them into the index
		header('location: index.php');
		exit;
	}else{
		# otherwise the login details are wrong
		$error = 'Incorrect username, password or no input';
	}
}

include '../views/header.php';
include '../views/navigation.php';
include '../views/login.php';
include '../views/footer.php';