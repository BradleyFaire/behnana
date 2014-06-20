<?php 

require_once '../libraries/config.lib.php';

class Product_list{

	public $items = array(); //holds content in database
	private $db;

	public function __construct($id = false){
		$this->db = new Database(
			Config::$hostname,
			Config::$username,
			Config::$password,
			Config::$database
			);

		$this->db
			->select('*')
			->from('tb_products')
			->where('deleted', '0'); //if they are not deleted. Deleted =0
		
		if($id){
			$this->db->where_and('category_id', $id);
		}

		$this->items = $this->db->get();
	}

	public function count_items(){
		return count($this->items);
	}

}

