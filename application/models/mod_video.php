<?php
class Mod_video extends V_Model {

    function Vidoes() {
        parent::Model();
    }
	
	//count all videos
	public function count_all($where = false){
		if($where != false) {
			$this->db->where('status', $where);
		}
		$this->db->from('videos');
		return $this->db->count_all_results();
	}
	
	//display only newest videos
	public function queryNewVideos($limit, $offset){
		$this->db->select('*')
			 ->from('videos')
			 ->limit($limit, $offset)
			 ->where('status','New');			 
			 return $this->db->get();
	}
	
	//display all contest videos
	function queryContestVideos($limit, $offset) {
        $this->db->select('*')
        	  ->from('enrollcontest')
			  ->limit($limit, $offset)
			  ->join('videos','videos.id = enrollcontest.videos_id');
		return $this->db->get();
    }
	
	//display all contest videos for detail
	function queryPopularVideos($limit, $offset) {
        $this->db->select("*, (likes + views) as popular")
        	  ->from('videos')
			  ->limit($limit, $offset)
			  ->order_by("popular", "DESC");
		return $this->db->get();
    }
	
	//display all Popular for front page
	function queryPopularVideo(){
        $query = $this->db->select("*, (likes + views) as popular")
                ->from("videos")
                ->limit(4)
                ->order_by("popular","DESC");
        $result = $query->get();
        return $result;
    }
	
	//select specify vdo for play
	public function selectVideo(){
		$this->db->select('*')
				 ->from('videos')
				 ->where('id', $this->uri->segment(3));
				 
		return $this->db->get();
	}
		
	//Insert video
	public function insertRating(){
        return $this->db->insert('votes', $data);
	}
}