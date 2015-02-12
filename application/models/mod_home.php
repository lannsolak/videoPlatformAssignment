<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_home extends V_Model {
    // for query latest video
    function queryNewVideo()
    {
        $query = $this->db->select("*")
                ->from("videos")
                ->limit(4)
                ->where('status', 'New')
                ->order_by("id","DESC");
        $result = $query->get();
        return $result;
    }
    // for query popular video
    function queryPopularVideo(){
        $query = $this->db->select("*, (likes + views) as popular")
                ->from("videos")
                ->limit(4)
                ->order_by("popular","DESC");
        $result = $query->get();
        return $result;
    }
    // for query video contesting
    function queryContestVideo(){
        $query = $this->db->select('*')
                ->from('enrollcontest')
                ->join('videos', 'videos.id = enrollcontest.id')
                ->limit(4)
                ->order_by("videos.id","DESC");
        $result = $query->get();
        return $result;
    }
}
