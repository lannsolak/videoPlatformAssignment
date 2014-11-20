<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class V_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

    public function Hello(){
    	echo "hello world !!!"; die();
    }

}

/* End of file V_Controller.php */
/* Location: ./application/core/V_Controller.php */