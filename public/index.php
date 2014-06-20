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



include '../views/header.php';
include '../views/navigation.php';

if($_GET['category_id'] == true){

	include '../views/product_list.php';

}else if($_GET['product_id'] == true){

	include '../views/product_info.php';

}else if($_GET['cart'] == true){

	include '../views/cart.php';

}else{
	include '../views/home.php';
}

include '../views/footer.php';