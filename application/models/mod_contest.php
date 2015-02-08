<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_contest extends V_Model {
	
	public function queryNewContest(){
		$query = $this->db->select("id, title")
					  ->from("contests")
					  ->where("status", "new")
					  ->get();
		return  $query;
	}
	public function queryProgressContest(){
		$query = $this->db->select("*")
					  ->from("contests")
					  ->where("status", "progress")
					  ->get();
		return  $query;
	}
	public function queryContestSchedule(){
		$query = $this->db->select("*, contests.id as cid")
					  ->from("contests")
					  ->join("schedules", 'contests.schedules_id = schedules.id')
					  ->order_by("contests.id", "DESC")
					  ->where("schedules.isActive", 1)
					  ->where("contests.status != ", "draft")
					  ->get();
		return  $query;
	}
	public function queryWinnerContest(){
		$query = $this->db->select("*,contests.title as ctitle,videos.title as vtitle,enrollcontest.id as ecid")
					  ->from("enrollcontest")
					  ->join("videos", 'videos.id = enrollcontest.videos_id')
					  ->join("contests", 'contests.id = enrollcontest.contests_id')
					  ->join("users", 'users.id = enrollcontest.users_id')
					  ->where("enrollcontest.isWin !=", 0)
					  ->get();
		return  $query;
	}

}