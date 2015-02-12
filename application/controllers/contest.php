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
                $file_upload = $this->do_upload();
                if($file_upload['video']['error'] != null){
                    $this->session->set_userdata("video_error", $file_upload['video']['error']);
                } else {
                    if($file_upload['images']['error'] != null) {
                        $this->session->set_userdata("image_error", $file_upload['images']['error']);
                        $thumbnail = null;
                    } else {
                        $thumbnail = $file_upload['images']['data']['file_name'];
                    }

                    $insert["title"] = $this->input->post("videotitle");
                    $insert["description"] = $this->input->post("videodescription");
                    $insert["size"] = $file_upload['video']['data']['file_size'];
                    $insert["extension"] = $file_upload['video']['data']['file_ext'];
                    $insert["path"] = '/uploaded/'.$file_upload['video']['data']['file_name'];
                    $insert["thumbnail"] = $thumbnail;
                    $insert["upload_date"] = date("Y-m-d");
                    $insert["user_id"] = $this->input->post("userId");
                    $vid = V_Model::insertVideo($insert);
                }
            } else {
                $vid = $this->input->post("videoId");
            }

            $insertEnroll['contests_id'] = $this->input->post("contestId");
            $insertEnroll['videos_id'] = $vid;
            $insertEnroll['users_id'] = $this->input->post("userId");
            $insertEnroll['comments'] = $this->input->post("comment");
            $insertEnroll['date'] = date("Y-m-d");

            $ecId = $this->mod_contest->insertEnrollData($insertEnroll);

            if($ecId > 0) $this->session->set_userdata("success_enroll", "Your request to enroll contest was submited, waiting approving from administrator.");
        }

        redirect('contest/details/'.$this->input->post("contestId"));
    }

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
    // function upload video
    public function execute_upload_video($videos)
    {
        $config['upload_path'] = './uploaded/videos/';
        $config['allowed_types'] = 'mp4|flv|wmv|';
        $config['max_size'] = '3100';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($videos))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }
    // function upload image
    public function execute_upload_images($images)
    {
        $config['upload_path'] = './uploaded/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($images))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }
}
