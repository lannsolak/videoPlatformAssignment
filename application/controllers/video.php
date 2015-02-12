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
		$config['base_url'] = site_url("video/newvideo");
        $config['total_rows'] = $this->mod_video->count_all('New');        
        $config['per_page'] = 1;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);      

        $data['AllNewVideos'] = $this->mod_video->queryNewVideos($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();		
        $data['title'] = 'Newest videos!';

        $this->load->view('index', $data);
		}
	
		public function play(){
			$this->load->view("index");	
		}
		
		
		//all contest vdo with mention
    public function contestvideo(){
        $config['base_url'] = site_url('video/contestvideo');
        $config['total_rows'] = $this->db->count_all('enrollcontest');
        
        $config['per_page'] = 1;
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
        $config['base_url'] = site_url('video/popularvideo');
        $config['total_rows'] = $this->db->count_all('videos');
        
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['allpopularvdos'] = $this->mod_video->queryPopularVideos($config['per_page'],$page);
        $data['title'] = 'All Popular Videos';

        $this->load->view('index', $data);
    }
	
	//Play video
	public function playVideo(){
		$data['playvdo'] = $this->mod_video->selectVideo();
		$data['title'] = 'Play video!';
		
		$this->load->view('index', $data);
		}
		
	//Rating video
	public function rating(){
		echo "I am here !!!";
		echo $this->input->post('voter')."Hello";
		var_dump($this->input->post()); die();
		$data = array(
            'date' => $this->input->post('theDate'),
            'opion' => $this->input->post('opion'),
            'voter' => $this->input->post('voter')
        );
		
		$data['rate'] = $this->mod_video->insertRating();
		$data['title'] = 'Rating!';
		
		if($data > 0){
			$this->playVideo();
		}else{
			echo "Error submit!";
			}
		}	
}
