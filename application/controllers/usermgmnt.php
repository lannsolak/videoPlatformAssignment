<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermgmnt extends V_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('dashboard');
    }
    // all users for list pagination
    public function getAllUsers() {

    }
    // create new users or creator
    public function insertNewUsers(){

    }
    // get a row of your for edit and view
    public function findSingleUsers(){

    }
    // submiting the update user information
    public function updateUserInfo(){

    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
