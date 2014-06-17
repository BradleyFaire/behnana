<?php

require_once '../libraries/cart.lib.php';
require_once '../libraries/config.lib.php';
require_once '../libraries/database.lib.php';
require_once '../libraries/form.lib.php';
require_once '../libraries/hash.lib.php';
require_once '../libraries/login.lib.php';
require_once '../libraries/model.lib.php';



include '../views/header.php';
include '../views/navigation.php';
if($_GET['login'] == true){

	include '../views/login.php';

}else if($_GET['category_id'] == true){

	include '../views/product_list.php?category_id='.$_GET['category_id'];

}else if($_GET['product_id'] == true){

	include '../views/product_info.php?product_id='.$_GET['product_id'];

}else{
	include '../views/home.php';
}
include '../views/footer.php';