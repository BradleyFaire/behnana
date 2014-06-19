<?php 

require_once '../libraries/config.lib.php';
require_once '../libraries/hash.lib.php';

class User{

	#Property ===============================================!

	public $customer_id = 0;
	public $admin_id = 0;
	public $username = '';
	public $password = '';
	private $db = null;

	#MAGIC METHODS ===============================================!

	function __construct($admin_id = 0, $customer_id = 0){
		$this->db = new Database(
			Config::$hostname,
			Config::$username,
			Config::$password,
			Config::$database
			);

		if($admin_id){

			$result = $this->db
			->select('id, username, password')
			->from('tb_admins')
			->where('id', $admin_id)
			->get_one();

			$this->admin_id = $result['id'];
			$this->username = $result['username'];
			$this->password = $result['password'];

		}else if($customer_id){

			$result = $this->db
			->select('id, username, password')
			->from('tb_customers')
			->where('id', $customer_id)
			->get_one();

			$this->customer_id = $result['id'];
			$this->username = $result['username'];
			$this->password = $result['password'];
		}
	}

	#NORMAL METHODS ===============================================!

		public function admin_authenticate(){
			
			$user = $this->db
				->select('salt')
				->from('tb_admins')
				->where('username', $this->username)
				->get_one();

				$encrypted_pw = Hash::encrypt(
					$this->password,
					$user['salt']
					);

			$result = $this->db
				->select('id')
				->from('tb_admins')
				->where('password', $encrypted_pw)
				->get_one();

			if($result['id']){
				$this->admin_id 		= $result['id'];
				return true;
			}else{
				return false;
			}
		}
		
		public function authenticate(){
			
			$user = $this->db
				->select('salt')
				->from('tb_customers')
				->where('username', $this->username)
				->get_one();

				$encrypted_pw = Hash::encrypt(
					$this->password,
					$user['salt']
					);

			$result = $this->db
				->select('id')
				->from('tb_users')
				->where('password', $encrypted_pw)
				->get_one();

			if($result['id']){
				$this->customer_id 		= $result['id'];
				return true;
			}else{
				return false;
			}
		}




		public function save(){
			#if this is is 0 then no subject has been alrady loaded
			if($this->id == 0){
				$success = $this->db
					->set(array(
						'username'			=> $this->username,
						'password'		=> Hash::make_password($this->password),
						'salt'			=> Hash::salt()
						
					))
				->insert('tb_users');
			}else{
				$success = $this->db
					->set(array(
						'username'			=> $this->username,
						'password'		=> Hash::make_password($this->password),
						'salt'			=> Hash::salt()
						))
					->where('id', $this->id)
					->update('tb_users');
			}

			return $success;
		}

		public function delete(){
			$this->deleted = 1;
			$this->save();
		}



}