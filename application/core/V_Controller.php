<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class V_Controller extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

    // public function uploadVideo(){
    // 	echo "hello world !!!";
    //     // var_dump($this->execute_upload_video("videofiles"));
    //     var_dump($this->execute_upload_images("thumbfile"));
    //     die();
    // }
    // public function execute_upload_video($videos)
    // {
    //     $config['upload_path'] = './uploaded/videos/';
    //     $config['allowed_types'] = 'mp4|flv|wmv|';
    //     $config['max_size'] = '3100';

    //     $this->load->library('upload', $config);

    //     if ( ! $this->upload->do_upload($videos))
    //     {
    //         $error = array('error' => $this->upload->display_errors());
    //         return $error;
    //     }
    //     else
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         return $data;
    //     }
    // }
    // public function execute_upload_images($images)
    // {
    //     $config['upload_path'] = './uploaded/images/';
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['max_size'] = '100';
    //     $config['max_width']  = '1024';
    //     $config['max_height']  = '768';

    //     $this->load->library('upload', $config);

    //     if ( ! $this->upload->do_upload($images))
    //     {
    //         $error = array('error' => $this->upload->display_errors());
    //         return $error;
    //     }
    //     else
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         return $data;
    //     }
    // }
}

/* End of file V_Controller.php */
/* Location: ./application/core/V_Controller.php */
