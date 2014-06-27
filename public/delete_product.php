<?php

require_once '../libraries/database.lib.php';
require_once '../libraries/model.lib.php';
require_once '../libraries/login.lib.php';

#if you are not logged in, then you cannot access this page
Login::kickout();

# if the category_id exists in the url, then
if($_GET['product_id']){
	# set up access to tb_categories in db
	$product = new Model('tb_products');
	# load all of the information of this category's id
	$product->load($_GET['product_id']);
	# then delete it
	$product->delete();
}

# redirect to index
header('location: index.php');
exit;