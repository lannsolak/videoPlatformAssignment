<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_Profile extends V_Model {
	
	public function selectUserProfile(){
		$this->db->select('*');
		$this->db->from('users');
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
		 return $query; // just return $query
		}
	}
	 public function getUserId($id) {
        $query = $this->db->select('*')
		->where('id', $id)
        ->get('users');
        return $query;
    }
	public function updateUser($userid, $username, $userpassword, $usergenter, $usercountry, $usercity, $userzipcode, $userphone , $userskill ,$userinterest) {		
	  $update = array(
            'name' => $username,
            'password' => $userpassword,
            'gender' => $usergenter,
            'country' => $usercountry,
            'city' => $usercity,
            'zipcode' => $userzipcode,
            'phone' => $userphone,
            'skill' => $userskill,
			'interest' => $userinterest,
        );
		$this->db->where('id', $userid);
		return $this->db->update('users', $update);
    }

    
	function getVideo(){
		$query = $this->db->select('*');
				 $this->db->from('videos');
				 $this->db->join('users','users.id = videos.user_id');
				 $query = $this->db->get();

		if ($query->num_rows() > 0)
		{
		 return $query; // just return $query
		}
	}


	 public function getVDOId($id) {
        $query = $this->db->select('*')
		->where('id', $id)
        ->get('videos');
        return $query;
    }

    public function updateVDO($vdoid , $vdotitle,  $description, $size, $extention, $lenght, $path, $thumbnail , $views ,$likes,$status) {		
	  $update = array(
            'title' => $vdotitle,
            'description' => $description,
            'size' => $size,
            'extension' => $extention,
            'length' => $lenght,
            'path' => $path,
            'thumbnail' => $thumbnail,
            'views' => $views,
			'likes' => $likes,
			'status' => $status,
        );
		$this->db->where('id', $vdoid);
		return $this->db->update('videos', $update);
    }

    function deletevdo($id){
	   $this->db->where('id', $id);
	   $this->db->delete('videos'); 
	}



	function getVdoContest(){
		$query = $this->db->select('*');
				 $this->db->from('contests');
				 $this->db->join('schedules','schedules.id = contests.schedules_id');
				 $query = $this->db->get();

		if ($query->num_rows() > 0)
		{
		 return $query; // just return $query
		}
	}


	

}