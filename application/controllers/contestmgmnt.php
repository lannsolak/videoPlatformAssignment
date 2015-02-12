<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contestmgmnt extends V_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("mod_contestmgmnt");
    }
    public function index()
    {
        $data = $this->getContestList();
        $this->load->view('dashboard', $data);
    }
    // public function getContestList
    public function getContestList(){
        $config['base_url'] = site_url("contestmgmnt/index");
        $config['total_rows'] = $this->mod_contestmgmnt->count_all();
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

        $data['contestList'] = $this->mod_contestmgmnt->queryContestList($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        return $data;
    }
    // edit contest
    public function contestedit($id){
        if($this->input->post("editContestSubmit")){
            $update["title"] = $this->input->post("title");
            $update["status"] = $this->input->post("status");
            $update["description"] = $this->input->post("description");
            $update["prize"] = $this->input->post("prize");
            $update["contact_detail"] = $this->input->post("contact");
            $data["updated"] = $this->mod_contestmgmnt->updateContestData($id, $update);
        }
        $data["contestToEdit"] = $this->mod_contestmgmnt->contestToEdit($id);
        $this->load->view('dashboard',$data);
    }
    // add contest
    public function contestadd(){
        if($this->input->post("createContestSubmit")){
            $insert["title"] = $this->input->post("title");
            $insert["status"] = $this->input->post("status");
            $insert["description"] = $this->input->post("description");
            $insert["prize"] = $this->input->post("prize");
            $insert["contact_detail"] = $this->input->post("contact");
            $data["inserted"] = $this->mod_contestmgmnt->insertContestData($insert);
        }
        $data["title"] = "add new contest";
        $this->load->view('dashboard',$data);
    }


    // detete contest
    public function contestdelete($id) {
        $data["deleted"] = $this->mod_contestmgmnt->deleteContest($id);
        if($data["deleted"]){
            $this->session->set_userdata("success", $data["deleted"]);
        }else{
           $this->session->set_userdata("problem", "There are some problem occur with deleting contest !!!");
        }
        redirect("contestmgmnt/");
    }
}
