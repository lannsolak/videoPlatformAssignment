<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends V_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_home'));
    }
    // retrive data to show in index page
	public function index()
	{
        $data["newVideos"] = $this->getNewVideo();
        $data["popularVideos"] = $this->getPopularVideo();
        $data["contestVideos"] = $this->getContestVideo();
	    $this->load->view('index', $data);      
	}
    // for get latest video
    public function getNewVideo(){
        return $this->mod_home->queryNewVideo();
    }
    // for get popular video
    public function getPopularVideo(){
        return $this->mod_home->queryPopularVideo();
    }
    // for get video that contesting
    public function getContestVideo(){
        return $this->mod_home->queryContestVideo();
    }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
