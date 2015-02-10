<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contest extends V_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array("mod_contest"));
    }
    // default contest page
    public function index(){
        $data["newContest"] = $this->getNewContest();
        $data["scheduleContest"] = $this->getContestWithSchedule();
        $data["progressContest"] = $this->getInprogressingContest();
        $data["winnerContest"] = $this->getWinnerContest();
        $this->load->view("index", $data);
    }
    // new contest page
    public function newcontest(){
        $data["newContest"] = $this->getNewContest();
        $this->load->view("index", $data);
    }
    // contest detail page
    public function details($id){
        $data["detailsContest"] = $this->mod_contest->queryDetailsContest($id);
        $data["userVideoList"] = null;
        if($this->session->userdata("userId")) {
            $userId = $this->session->userdata("userId");
            $enrolledVideoID = $this->mod_contest->getIsEnrolledVideoID($userId);
            if($enrolledVideoID == null) {
                $enrolledVideoID = array(0);
            } else {
                foreach($enrolledVideoID as $vid){
                    $v[$vid->videos_id] = $vid->videos_id;
                }
                $enrolledVideoID = $v;
            }
            $data["userVideoList"] = $this->mod_contest->queryUserVideo($userId, $enrolledVideoID);
        }
        $this->load->view("index", $data);
    }

    // Enroll Contest
    public function enrollContest(){
        if($this->input->post('btnSubmitEnroll')){
            if($this->input->post('new_upload')){
                // var_dump($this->input->post()); die();
                // $this->uploadVideo();
                // $this->do_upload();
            }
            // var_dump($this->input->post('new_upload')); die();
        }else{

        }
    }
    // function do_upload(){
    //     $config['upload_path'] = './uploaded/images/';
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['max_size'] = '100';
    //     $config['max_width']  = '1024';
    //     $config['max_height']  = '768';

    //     $this->load->library('upload', $config);

    //     if ( ! $this->upload->do_upload("thumbfile"))
    //     {
    //         $error = array('error' => $this->upload->display_errors());
    //         var_dump($error);
    //     }
    //     else
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         var_dump($data);
    //     }
    // }
    // return the new contest
    public function getNewContest() {
    	$new = $this->mod_contest->queryNewContest();
    	if($new->num_rows() > 0) {
    		return $new->result();
    	}else{
           return null;
        }
    }
    // return the contest with schedule
    public function getContestWithSchedule(){
        $contestSchedule = $this->mod_contest->queryContestSchedule();
        if($contestSchedule->num_rows() > 0) {
            return $contestSchedule->result();
        }else{
           return null;
        }
    }
    // return in progressing contest
    public function getInprogressingContest(){
        $progress = $this->mod_contest->queryProgressContest();
        if($progress->num_rows() > 0) {
            return $progress->result();
        }else{
           return null;
        }
    }
    // return winner contest
    public function getWinnerContest(){
        $winner = $this->mod_contest->queryWinnerContest();
        if($winner->num_rows() > 0) {
            return $winner->result();
        }else{
           return null;
        }
    }
}
