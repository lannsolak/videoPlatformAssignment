<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class V_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function insertVideo($insert = array()){
    	$this->db->insert('videos', $insert);
    	return $this->db->insert_id();
    }
}

/* End of file V_Model.php */
/* Location: ./application/core/V_Model.php */