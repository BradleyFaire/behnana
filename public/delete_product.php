<?php

require_once '../libraries/database.lib.php';
require_once '../libraries/model.lib.php';
require_once '../libraries/login.lib.php';

Login::kickout();

if($_GET['product_id']){
	$product = new Model('tb_products');
	$product->load($_GET['product_id']);
	$product->delete();
}

header('location: index.php');
exit;