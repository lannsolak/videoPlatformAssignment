<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends V_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->library('pagination');
		$this->load->model('mod_video');
    }
	//all vdo with mention
    public function index(){
        $data['newVideo'] = $this->mod_video->queryNewVideos(4,0);
		$data['videosInContest'] = $this->mod_video->queryContestVideos(4,0);
		$data['videosInPopular'] = $this->mod_video->queryPopularVideo(4,0);
        $data['title'] = 'Browsing videos';
        $this->load->view('index', $data);
    }

	// all newest vdos
	public function newvideo(){
        $config = $this->paginationConfig();
		$config['base_url'] = site_url("video/newvideo");
        $config['total_rows'] = $this->mod_video->count_all('New');
        $config['per_page'] = 24;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['AllNewVideos'] = $this->mod_video->queryNewVideos($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Newest videos!';

        $this->load->view('index', $data);
	}

	//all contest vdo with mention
    public function contestvideo(){
        $config = $this->paginationConfig();
        $config['base_url'] = site_url('video/contestvideo');
        $config['total_rows'] = $this->db->count_all('enrollcontest');
        $config['per_page'] = 24;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['allcontestvdos'] = $this->mod_video->queryContestVideos($config['per_page'],$page);
        $data['title'] = 'All Contest Videos';

        $this->load->view('index', $data);
    }

	//all popular vdos
    public function popularvideo(){
        $config = $this->paginationConfig();
        $config['base_url'] = site_url('video/popularvideo');
        $config['total_rows'] = $this->db->count_all('videos');

        $config['per_page'] = 24;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['allpopularvdos'] = $this->mod_video->queryPopularVideos($config['per_page'],$page);
        $data['title'] = 'All Popular Videos';

        $this->load->view('index', $data);
    }

	//Play video
	public function playVideo($id){
		$data['playvdo'] = $this->mod_video->selectVideo($id);
        $isContestVideo = $this->mod_video->checkVideo($id);
        if($isContestVideo->num_rows() > 0) {
            foreach($isContestVideo->result() as $enrollcontestid){
                $data['voteCount'] = $this->mod_video->counntVote($enrollcontestid->ecid);
                $data['ecid'] = $enrollcontestid->ecid;
            }
        }
        // $this->mod_video->updateViewVideo();
		$data['title'] = 'Play video!';
		$this->load->view('index', $data);
	}

	//vote video
	public function vote($vid){
		if($this->input->post('btnSubmitVote')){
           $data = array(
            'date' => date("Y-m-d"),
            'opion' => $this->input->post('thinking'),
            'voter' => $this->input->post('visitoremail'),
            );
            $data['voteId'] = $this->mod_video->insertVote($data);
            if($data['voteId'] > 0){
                $insert['votes_id'] = $data['voteId'];
                $insert['ec_id'] = $this->input->post('enrollContestId');
                $result = $this->mod_video->insertVoteConjection($insert);
                if($result) {
                    $this->session->set_userdata("success_vote", "You successfully voted this video !!!");
                } else {
                    $this->session->set_userdata("problem_vote", "There are some problem which you cannot vote this videos !!!");
                }
            } else {
                $this->session->set_userdata("problem_vote", "There are some problem which you cannot vote this videos !!!");
            }
        }
        redirect("video/playVideo/".$vid);
	}

    // get pagination config
    public function paginationConfig(){
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
        return $config;
    }
}
