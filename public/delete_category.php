<?php

require_once '../libraries/database.lib.php';
require_once '../libraries/model.lib.php';
require_once '../libraries/login.lib.php';

Login::kickout();

if($_GET['category_id']){
	$category = new Model('tb_categories');
	$category->load($_GET['category_id']);
	$category->delete();
}

header('location: index.php');
exit;