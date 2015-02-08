<?php 
	/**
	* 
	*/
	class User_model extends CI_Model
	{
		private $table = "users";

		private function check_confirm_password($password, $confirm_password){
			if($password !== $confirm_password){
				$this->form_validation->set_message("Password doen't match each other!");
				return false;
			}
			return true;
		}

		public function add_by_post($post)
		{

			$this->load->library("form_validation");
			$this->form_validation->set_rules('name', 'Name', 'trim|required|string|min_length[4]|max_length[30]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'check_confirm_password');
			$this->form_validation->set_rules('sex', 'Gender', 'required');
			$this->form_validation->set_rules('country', 'Country', 'trim|required|string');
			$this->form_validation->set_rules('city', 'City', 'trim|required|string');
			$this->form_validation->set_rules('zip_code', 'Zip Code', 'trim');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('skill', 'Skill', 'trim|string');
			$this->form_validation->set_rules('interest', 'interest', 'trim|string');

			if ($this->form_validation->run() == FALSE)
			{
				return false;
			}

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
	} 