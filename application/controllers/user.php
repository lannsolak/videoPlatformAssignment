<?php
class User extends V_Controller {

	private $password;
	private $confirm_password;

	public function __construct() {
        parent::__construct();
    }

	/**
	* show registration page
	*/	
    public function show_register(){
    	$data["page"] = "user/register";
    	$this->load->view("index", $data);
    }

    public function check_confirm_password(){
		if($this->password != $this->confirm_password) {
			$this->form_validation->set_message('check_confirm_password', "Password doen't match each other!");
			return false;
		}
		return true;
	}

    public function register()
    {
    	if(!$this->input->post()){
    		redirect("user/show_register");
    	}

    	$this->password = $this->input->post('password');
    	$this->confirm_password = $this->input->post('confirm_password');

    	$this->load->library("form_validation");
		$this->form_validation->set_rules('name', 'Name', 'trim|required|string|min_length[4]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'callback_check_confirm_password|xss_clean');
		$this->form_validation->set_rules('sex', 'Gender', 'required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|string');
		$this->form_validation->set_rules('city', 'City', 'trim|required|string');
		$this->form_validation->set_rules('zip_code', 'Zip Code', 'trim');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('skill', 'Skill', 'trim|string');
		$this->form_validation->set_rules('interest', 'interest', 'trim|string');

		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model("user_model");
	    	$this->user_model->add_by_post($this->input->post());
	    	redirect("user/show_login");
		}

		$this->show_register();
    }

    /**
	* show login page
	*/
	public function show_login()
	{
		$data["page"] = "user/login";
		$this->load->view("index", $data);
	} 

	public function login()
	{
		if(!$this->input->post()){
			redirect("user/show_login");
		}

		$this->load->library("form_validation");
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

		if($this->form_validation->run() == true){

			$this->load->model('user_model');
			$user_found = $this->user_model->check_login($this->input->post('email'), $this->input->post('password'));
			
			if($user_found > 0){
				$this->session->set_userdata('email', $this->input->post('email'));
				$this->session->set_userdata('name', $this->user_model->user_name);
				$this->session->set_userdata('id', $this->user_model->user_id);
				$this->session->set_userdata('role_id', $this->user_model->user_role);

				if($this->user_model->user_role == 2){
					redirect('contest/index');
				}
				redirect('dashboard/index');
				
			} else {
				echo '<script type="text/javascript">alert("Email or Password does not match!!!");</script>';
			}
		}

		$this->show_login();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/home');
	}

}