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
        if($this->input->post("createUserSubmit")){
            $insert["name"] = $this->input->post("name");
            $insert["email"] = $this->input->post("email");
            $insert["password"] = $this->input->post("password");
            $insert["gender"] = $this->input->post("gender");
            $insert["phone"] = $this->input->post("phone");
            $insert["country"] = $this->input->post("country");
            $insert["city"] = $this->input->post("city");
            $insert["zipcode"] = $this->input->post("zipcode");
            $insert["skill"] = $this->input->post("skill");
            $insert["interest"] = $this->input->post("interest");
            $insert["role_id"] = 2;
            $data["inserted"] = $this->mod_usermgmnt->insertUserData($insert);
        }
        $data["title"] = "add new user";
        $this->load->view('dashboard', $data);
    }
    // create new users or creator
    public function useredit($id){
        if($this->input->post("editUserSubmit")){
            $update["name"] = $this->input->post("name");
            $update["email"] = $this->input->post("email");
            $update["gender"] = $this->input->post("gender");
            $update["phone"] = $this->input->post("phone");
            $update["country"] = $this->input->post("country");
            $update["city"] = $this->input->post("city");
            $update["zipcode"] = $this->input->post("zipcode");
            $update["skill"] = $this->input->post("skill");
            $update["interest"] = $this->input->post("interest");
            $data["updated"] = $this->mod_usermgmnt->updateUserData($id, $update);
        }
        $data["userToEdit"] = $this->mod_usermgmnt->userToEdit($id);
        $this->load->view('dashboard',$data);
    }

    // public function getUserList
    public function getUserList(){
        $config['base_url'] = site_url("usermgmnt/index");
        $config['total_rows'] = $this->mod_usermgmnt->count_all();
        $config['per_page'] = 10;
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
        $config['last_link'] = '&gt;&gt;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['userList'] = $this->mod_usermgmnt->queryUserList($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        return $data;
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
