<?php

require_once '../libraries/model.lib.php';

class Category_model extends Model{

	public $table = 'tb_categories';

	public function __construct(){
		parent::__construct($this->table);
	}

	public function category_name($category){

		$test = $this->db
			->select('name')
			->from($this->table)
			->where('id', $category)
			->get_one();
			return $test;
	}

	public function list_categories(){
		$this->data = $this->db
		->select('*')
		->from($this->table)
		->where('deleted', '0') //if they are ot deleted. Deleted =0
		->get();
		return $this->data;
	}

	public function list_names(){

		$result = $this->db
			->select('name')
			->from($this->table)
			->where('deleted', '0')
			->get();
			$this->data = $result;

	}

}