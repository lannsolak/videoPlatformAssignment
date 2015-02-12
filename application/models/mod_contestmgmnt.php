<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_contestmgmnt extends V_Model {
    //count all contest
    public function count_all($where = false){
        if($where != false) {
            $this->db->where('id', $where);
        }
        $this->db->from('contests');
        return $this->db->count_all_results();
    }
    // get the list of contests
    public function queryContestList($limit, $offset){
        $query = $this->db->select("*")
                          ->from("contests")
                          ->limit($limit, $offset)
                          ->order_by("id", "DESC")
                          ->get();
        return $query;
    }
    // delete contests
    public function deleteContest($id){
        $this->db->where('id', $id);
        $this->db->delete('contests');
        $rowAffected = $this->db->affected_rows();
        if($rowAffected == 0){
            return "Deleted the contest successfully !!!";
        }
    }
    // get contest edit
    public function contestToEdit($id){
        $query = $this->db->select("*")
                 ->from("contests")
                 ->where('id', $id)
                 ->get();
        return $query;
    }

    // update contest data
    public function updateContestData($id, $update){
        $this->db->where('id', $id);
        $this->db->update('contests', $update);
        $rowAffected = $this->db->affected_rows();
        if($rowAffected > 0){
            return "The contest updated successfully !!!";
        }
    }
    // insert contest data
    public function insertContestData($insert){
        $this->db->insert('contests', $insert);
        $insertid = $this->db->insert_id();
        if($insertid > 0){
            return "The contest created successfully !!!";
        }
    }
}
