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
        $this->load->view("index", $data);
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
}
