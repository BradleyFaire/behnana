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

#load the basic html/css needed for the website
include '../views/header.php';
include '../views/navigation.php';

#firstly, if there's a category_id (we clicked on a category)
if($_GET['category_id'] == true){

	#then show us its product list
	include '../views/product_list.php';

}
#or if there's a product_id (we clicked on a specific product)
else if($_GET['product_id'] == true){

	#then show us that product's information
	include '../views/product_info.php';

}
# or if we clicked that browse button
else if($_GET['browse'] == true){

	#show us ALL the things
	include '../views/all_products.php';

}
# otherwise
else{
	# go back to the homepage
	include '../views/home.php';
}

# don't forget the footer
include '../views/footer.php';