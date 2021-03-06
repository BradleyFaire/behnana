<?php

require_once '../libraries/model.lib.php';
require_once '../libraries/hash.lib.php';

#Creates an extention to the Model Library, with a specific function used only in a specific situation. (The tb_customers is specific to this function, which is why it is seperated from the model library, which can be used with any table.)
class Customer extends Model{

	public $table = 'tb_customers';

	# construct the tb_customers table
	public function __construct(){
		parent::__construct($this->table);
	}

	# see if they have correct customer login details
	public function authenticate(){

		# select the id, salt, and encrypted pw from tb_customers where the usernames match up
		$user = $this->db
			->select('id, salt, password')
			->from($this->table)
			->where('username', $this->data['username'])
			->get_one();

		# encrypt the pw and salt they entered
		$encrypted_pw = Hash::encrypt(
			$this->data['password'],
			$user['salt']
		);

		# if the password they entered matches up with the encrypted one
		if($user['password'] == $encrypted_pw){
			$this->load($user['id']);
			# open the gates
			return true;
		}else{
			# otherwise get out of here
			return false;
		}
	}

}