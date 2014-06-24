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

	public function kickout(){
		if($_SESSION['admin_logged_in'] == false){
			header('location: login_page.php');
			exit;
		}
	}

	public function not_customer(){
		if($_SESSION['admin_logged_in'] == false){
			if($_SESSION['customer_logged_in'] == false){
				header('location: login_page.php');
				exit;
			}
		}
	}
}