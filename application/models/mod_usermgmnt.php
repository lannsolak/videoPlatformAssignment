<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_usermgmnt extends V_Model {

    //count all users
    public function count_all($where = false){
        if($where != false) {
            $this->db->where('id', $where);
        }
        $this->db->where('role_id', 2);
        $this->db->from('users');
        return $this->db->count_all_results();
    }
    // get the list of users
    public function queryUserList($limit, $offset){
        $query = $this->db->select("*")
                          ->from("users")
                          ->limit($limit, $offset)
                          ->where("role_id", 2)
                          ->order_by("id", "DESC")
                          ->get();
        return $query;
    }
    // delete user
    public function deleteUser($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
        $rowAffected = $this->db->affected_rows();
        if($rowAffected == 0){
            return "Deleted the user successfully !!!";
        }
    }
    // update user status
    public function updateStatusUser($id){
        $this->db->where('id', $id);
        $data["status"] = "member";
        $this->db->update('users', $data);
        $rowAffected = $this->db->affected_rows();
        if($rowAffected > 0){
            return "The user updated to member successfully !!!";
        }
    }
}
