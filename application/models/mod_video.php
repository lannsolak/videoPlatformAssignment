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
	public function selectVideo($id){
		$this->db->select('*')
				 ->from('videos')
				 ->where('id', $id);
		return $this->db->get();
	}

    // check video is the contest video or not
    public function checkVideo($id){
        $query = $this->db->select('enrollcontest.id as ecid')
                 ->from('enrollcontest')
                 ->where('videos_id', $id)
                 ->get();
        return $query;
    }
    // count video voting
    public function counntVote($ecid){
        $this->db->where('ec_id', $ecid);
        $this->db->from('votevideocontest');
        return $this->db->count_all_results();
    }

    // Insert vote
    public function insertVote($voter){
        $this->db->insert('votes', $voter);
        return $this->db->insert_id();
    }
    // insert into table conjection
    public function insertVoteConjection($insert){
        $this->db->insert('votevideocontest', $insert);
        return $this->db->affected_rows();
    }
}
