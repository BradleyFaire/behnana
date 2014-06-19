<?php

require_once '../libraries/model.lib.php';
require_once '../libraries/hash.lib.php';

#Creates an extention to the Model Library, with a specific function used only in a specific situation. (The tb_admins is specific to this function, which is why it is seperated from the model library, which can be used with any table.)
class Admin extends Model{

	public $table = 'tb_admins';

	public function __construct(){
		parent::__construct($this->table);
	}

	public function authenticate(){

		$user = $this->db
			->select('id, salt, password')
			->from($this->table)
			->where('username', $this->data['username'])
			->get_one();

		$encrypted_pw = Hash::encrypt(
			$this->data['password'],
			$user['salt']
		);

		if($user['password'] == $encrypted_pw){
			$this->load($user['id']);
			return true;
		}else{
			return false;
		}
	}

}