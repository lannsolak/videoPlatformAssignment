<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class V_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

    function do_upload(){
        $config['upload_path'] = './uploaded/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|3gp|flv';
        $config['max_size'] = '10000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $video["error"] = null;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload("videofiles"))
        {
            $video["error"] = $this->upload->display_errors();
        }
        else
        {
            $video["data"] = $this->upload->data();
        }

        $images = array();

        if($video["error"] == null){
            $images = $this->uploadimages();
        }
        return array("video" => $video, "images" => $images);        
    }

    public function uploadimages(){

        $data["error"] = null;

        if ( ! $this->upload->do_upload("thumbfile"))
        {
            $data["error"] = $this->upload->display_errors();
        }
        else
        {
            $data["data"] = $this->upload->data();
        }
        return $data;
    }
}

/* End of file V_Controller.php */
/* Location: ./application/core/V_Controller.php */
