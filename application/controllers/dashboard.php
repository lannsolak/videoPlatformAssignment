<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends V_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('dashboard');
    }
    // new request for enroll the contest
    public function getNewRequest() {

    }
    // new user registration
    public function getNewUsers(){

    }
    // new video uploading
    public function getNewVideo(){

    }
    // new contest or draft contest
    public function getDraftContest(){

    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
