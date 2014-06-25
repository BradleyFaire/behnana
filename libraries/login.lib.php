<?php

# folder: libraries
# file: login.lib.php

session_start();

class Login{

	public function admin_log_in(){
		$_SESSION['admin_logged_in'] = true;
	}

	public function customer_log_in(){
		$_SESSION['customer_logged_in'] = true;
	}

	public function log_out(){
		$_SESSION['admin_logged_in'] = false;
		$_SESSION['customer_logged_in'] = false;
	}


	#This protects all pages only Admins can see.
	public function kickout(){

		#This checks the session array if the key Admin_logged_in is true or false, if it's false, it runs the code to change the page the user is on to the login page.
		if($_SESSION['admin_logged_in'] == false){
			header('location: login_page.php');
			exit;
		}
	}

	//Customer
	public function not_customer(){
		if($_SESSION['admin_logged_in'] == false){
			if($_SESSION['customer_logged_in'] == false){
				header('location: login_page.php');
				exit;
			}
		}
	}
}