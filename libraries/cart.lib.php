<?php

# filename: cart.lib.php

session_start();

class Cart{

	public static function add_product($id, $qty){

		self::create_cart();

		#if the product is already in the cart
		if(isset($_SESSION['cart']['id'])){
			#increase the quantity
			$_SESSION['cart'][$id] += intval($qty);
		}
		else{
			#or else set the quantity
			$_SESSION['cart'][$id] = intval($qty);
		}
	}

	public static function get_total(){

		self::create_cart();

		$amount = 0;

		foreach($_SESSION['cart'] as $quantity){
			$amount += $quantity;
		}

		return $amount;
	}

	public static function remove_product($id){
		unset($_SESSION['cart'][$id]);
	}

	public static function create_cart(){

		if(isset($_SESSION['cart']) == false){
			$_SESSION['cart'] = array();
		}
	}


	public static function set_quantity($id, $qty){
		self::create_cart();

		$_SESSION['cart'][$id] = intval($qty);
	}
}