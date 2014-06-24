<?php

session_start();

require_once '../libraries/config.lib.php';
require_once '../libraries/cart.lib.php';
require_once '../libraries/database.lib.php';
require_once '../libraries/form.lib.php';
require_once '../libraries/hash.lib.php';
require_once '../libraries/login.lib.php';
require_once '../libraries/model.lib.php';
require_once '../models/product_list.collection.php';
require_once '../models/category.collection.php';

if($_POST && $_POST['password'] == $_POST['confirmpassword']){

	$user = new Model(tb_customers);

	$user->username 	= $_POST['username'];
	$user->password     = Hash::make_password($_POST['password']);
	$user->salt         = Hash::salt();

	$user->save();
	header('location: login_page.php');
	exit;
}

else if($_POST){

	$error = 'Passwords do not match.';

}

include '../views/header.php';
include '../views/navigation.php';
include '../views/register_form.php';
include '../views/footer.php';