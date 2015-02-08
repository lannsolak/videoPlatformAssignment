<?php
class User extends V_Controller {

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

    public function register()
    {
    	if(!$this->input->post()){
    		redirect("user/show_register");
    	}
    	$this->load->model("user_model");
    	$add = $this->user_model->add_by_post($this->input->post());
    	if($add) redirect("user/show_register");

    	$this->show_register();
    }

}