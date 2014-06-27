<?php

require_once '../libraries/database.lib.php';
require_once '../libraries/model.lib.php';
require_once '../libraries/login.lib.php';

#if you are not logged in, then you cannot access this page
Login::kickout();

# if the category_id exists in the url, then
if($_GET['category_id']){
	# set up access to tb_categories in db
	$category = new Model('tb_categories');
	# load all of the information of this category's id
	$category->load($_GET['category_id']);
	# then delete it
	$category->delete();
}

# redirect to index
header('location: index.php');
exit;