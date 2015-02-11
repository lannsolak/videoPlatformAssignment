<?php 
	/**
	* 
	*/
	class User_model extends CI_Model
	{
		private $table = "users";
		public $user_name = "name";
		public $user_id = "id";
		public $user_role = "role_id";

		public function add_by_post($post)
		{
			$insert_data = [
				'name' => $post['name'],
				'email' => $post['email'],
				'password' => $post['password'],
				'gender' => $post['sex'],
				'country' => $post['country'],
				'city' => $post['city'],
				'zipcode'=> $post['zip_code'],
				'phone' => $post['phone_number'],
				'skill' => $post['skill'],
				'interest' => $post['interest']
			];

			$this->db->insert($this->table, $insert_data);
		}

		public function check_login($email, $password)
		{
			$this->db->select('email, id, name, role_id');
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$result = $this->db->get($this->table);

			if($result->num_rows() == 0) return false;

			$row = $result->row();
			$this->user_name = $row->name;
			$this->user_id = $row->id;
			$this->user_role = $row->role_id;
			return true;
		}
	} 