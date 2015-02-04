<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends V_Controller {
	public function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('index');
	}

	public function about(){
		$this->load->view('home/about');
	}

	function home(){
		$this->load->view('index');
	}

	function recentlyall(){
		$this->load->view('home/recentlyall');
	}

	function popularall(){
		$this->load->view('home/popularall');
	}

	function competitionall(){
		$this->load->view('home/competitionall');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
