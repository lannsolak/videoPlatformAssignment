<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermgmnt extends V_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("mod_usermgmnt");
    }
    public function index()
    {
        $data = $this->getUserList();
        $this->load->view('dashboard', $data);
    }
    // detete user
    public function userdelete($id) {
        $data["deleted"] = $this->mod_usermgmnt->deleteUser($id);
        if($data["deleted"]){
            $this->session->set_userdata("success", $data["deleted"]);
        }else{
           $this->session->set_userdata("problem", "There are some problem occur with deleting user !!!");
        }
        redirect("usermgmnt/");
    }
    // update user
    public function userstatus($id) {
        $data["updated"] = $this->mod_usermgmnt->updateStatusUser($id);
        if($data["updated"]){
            $this->session->set_userdata("success", $data["updated"]);
        }else{
           $this->session->set_userdata("problem", "There are some problem occur with update user from new to member !!!");
        }
        redirect("usermgmnt/");
    }
    // create new users or creator
    public function useradd(){
        $this->load->view('dashboard');
    }
    // get a row of your for edit and view
    public function findSingleUsers(){

    }
    // submiting the update user information
    public function updateUserInfo(){

    }
    // public function getUserList
    public function getUserList(){
        $config['base_url'] = site_url("usermgmnt/index");
        $config['total_rows'] = $this->mod_usermgmnt->count_all();
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_link'] = 'previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['userList'] = $this->mod_usermgmnt->queryUserList($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        return $data;
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
