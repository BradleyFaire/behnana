<?php

# folder: libraries
# file: login.lib.php

session_start();

class Login{

	# log in the admin
	public function admin_log_in(){
		$_SESSION['admin_logged_in'] = true;
	}

	# log in the customer
	public function customer_log_in(){
		$_SESSION['customer_logged_in'] = true;
	}

	# kick the admins and customers out muahaha
	public function log_out(){
		$_SESSION['admin_logged_in'] = false;
		$_SESSION['customer_logged_in'] = false;
	

	#This protects all pages only Admins can see.
	public function kickout(){

		#This checks the session array if the key Admin_logged_in is true or false, if it's false, it runs the code to change the page the user is on to the login page.
		if($_SESSION['admin_logged_in'] == false){
			header('location: login_page.php');
			exit;
		}
	}

	// check if they're a valid user
	public function not_customer(){
		# if you're not an admin
		if($_SESSION['admin_logged_in'] == false){
			# and also not a customer
			if($_SESSION['customer_logged_in'] == false){
				# then you'd better log in before you look at that
				header('location: login_page.php');
				exit;
			}
		}
	}
}