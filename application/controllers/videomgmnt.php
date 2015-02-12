<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videomgmnt extends V_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("mod_videomgmnt");
    }
    public function index()
    {
        $data = $this->getVideoList();
        $this->load->view('dashboard', $data);
    }
    // public function getVideoList
    public function getVideoList(){
        $config['base_url'] = site_url("videomgmnt/index");
        $config['total_rows'] = $this->mod_videomgmnt->count_all();
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

        $data['videoList'] = $this->mod_videomgmnt->queryVideoList($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        return $data;
    }
    // edit video
    public function videoedit($id){
        if($this->input->post("editVideoSubmit")){
            $update["title"] = $this->input->post("title");
            $update["description"] = $this->input->post("description");
            $update["status"] = $this->input->post("status");
            $data["updated"] = $this->mod_videomgmnt->updateVideoData($id, $update);
        }
        $data["videoToEdit"] = $this->mod_videomgmnt->videoToEdit($id);
        $this->load->view('dashboard',$data);
    }


    // detete video
    public function videodelete($id) {
        $data["deleted"] = $this->mod_videomgmnt->deletevideo($id);
        if($data["deleted"]){
            $this->session->set_userdata("success", $data["deleted"]);
        }else{
           $this->session->set_userdata("problem", "There are some problem occur with deleting video !!!");
        }
        redirect("videomgmnt/");
    }

    // update video
    public function videostatus($id) {
        $data["updated"] = $this->mod_videomgmnt->updateStatusvideo($id);
        if($data["updated"]){
            $this->session->set_userdata("success", $data["updated"]);
        }else{
           $this->session->set_userdata("problem", "There are some problem occur with update video from new to public !!!");
        }
        redirect("videomgmnt/");
    }
}
