<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_videomgmnt extends V_Model {

    //count all users
    public function count_all($where = false){
        if($where != false) {
            $this->db->where('id', $where);
        }
        $this->db->from('videos');
        return $this->db->count_all_results();
    }
    // get the list of videos
    public function queryVideoList($limit, $offset){
        $query = $this->db->select("*")
                          ->from("videos")
                          ->limit($limit, $offset)
                          ->order_by("id", "DESC")
                          ->get();
        return $query;
    }
    // delete video
    public function deleteVideo($id){
        $this->db->where('id', $id);
        $this->db->delete('videos');
        $rowAffected = $this->db->affected_rows();
        if($rowAffected == 0){
            return "Deleted the video successfully !!!";
        }
    }
    // update video status
    public function updateStatusVideo($id){
        $this->db->where('id', $id);
        $data["status"] = "public";
        $this->db->update('videos', $data);
        $rowAffected = $this->db->affected_rows();
        if($rowAffected > 0){
            return "The video updated to public successfully !!!";
        }
    }
    // get video edit status
    public function videoToEdit($id){
        $query = $this->db->select("*")
                 ->from("videos")
                 ->where('id', $id)
                 ->get();
        return $query;
    }

    // update video data
    public function updateVideoData($id, $update){
        $this->db->where('id', $id);
        $this->db->update('videos', $update);
        $rowAffected = $this->db->affected_rows();
        if($rowAffected > 0){
            return "The video updated successfully !!!";
        }
    }
}
