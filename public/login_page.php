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

	$admin = new Admin();

	$admin->username = $_POST['username'];
	$admin->password = $_POST['password'];

	$customer = new Customer();

	$customer->username = $_POST['username'];
	$customer->password = $_POST['password'];

	if($admin->authenticate()){
		Login::admin_log_in();
		header('location: index.php');
		exit;
	}else if($customer->authenticate()){
		Login::customer_log_in();
		header('location: index.php');
		exit;
	}else{
		$error = 'Incorrect username, password or no input';
	}
}

include '../views/header.php';
include '../views/navigation.php';
include '../views/login.php';
include '../views/footer.php';