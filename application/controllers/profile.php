
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends V_Controller {
	public function __construct() {
        parent::__construct();
		  $this->load->model('mod_profile');
    }
	function index()
	{
		//$this->load->view('profile/user_profile');
		//$userprofile = $this->mod_profile->selectUserProfile();
		//redirect('profile/user_profile'); 

		$userprofile['vdouser'] = $this->mod_profile->getVideo();
		$userprofile['contestvdo'] = $this->mod_profile->getVdoContest();

		$userprofile['records']=$this->mod_profile->selectUserProfile();
		$this->load->view('profile/profile',$userprofile);
		
		
	}
		
	function user_edit(){
	
		 $data['edit_user'] = $this->mod_profile->getUserId($this->uri->segment(3));
		 $this->load->view('profile/user_edit',$data);
			if ($this->input->post("btn_edit")) {
                $config = array(
                    array(
                        'field' => 'txtname',
                        'label' => 'Name',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
                     array(
                        'field' => 'txtpassword',
                        'label' => 'Password',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'txtgender',
                        'label' => 'Gender',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'txtcountry',
                        'label' => 'Country',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'txtcity',
                        'label' => 'City',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'txtzipcode',
                        'label' => 'Zipcode',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'txtphone',
                        'label' => 'Phone',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'txtskill',
                        'label' => 'Skill',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					array(
                        'field' => 'txtinterest',
                        'label' => 'Interest',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
                );
                $this->form_validation->set_rules($config);
				if($this->form_validation->run() == FALSE){
					$this->load->view('profile/user_edit',$data);
				}else{
				
					$userid = $this->input->post('id');
                    $username = $this->input->post('txtname');
                    
                    $userpassword = $this->input->post('txtpassword');
                    $usergenter = $this->input->post('txtgender');
                    $usercountry = $this->input->post('txtcountry');
                    $usercity = $this->input->post('txtcity');
                    $userzipcode = $this->input->post('txtzipcode');
					
					$userphone = $this->input->post('txtphone');
                    $userskill = $this->input->post('txtskill');
					$userinterest = $this->input->post('txtinterest');

                    $userdata = $this->mod_profile->updateUser($userid, $username, $userpassword, $usergenter, $usercountry, $usercity, $userzipcode, $userphone , $userskill ,$userinterest);
					if ($userdata > 0) {
						redirect ('profile');	
					}
						
					
				}
				
		}
				
	
	}

	function vdo_edit(){
	
		 $data['edit_vido'] = $this->mod_profile->getVDOId($this->uri->segment(3));
		 $this->load->view('profile/vdo_edit',$data);


		 if ($this->input->post("update_vdo")) {
                $config = array(
                    array(
                        'field' => 'vtitle',
                        'label' => 'Title',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
                     array(
                        'field' => 'vdescription',
                        'label' => 'description',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'vsize',
                        'label' => 'size',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'vextention',
                        'label' => 'extention',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'vlenght',
                        'label' => 'lenght',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'vpath',
                        'label' => 'path',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'vthumbnail',
                        'label' => 'thumbnail',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					 array(
                        'field' => 'vviews',
                        'label' => 'views',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
					array(
                        'field' => 'vlikes',
                        'label' => 'likes',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
                    array(
                        'field' => 'vstatus',
                        'label' => 'status',
                        'rules' => 'trim|required|alpha_num_dash_space|xss_clean|alpha_string'
                    ),
                );
                $this->form_validation->set_rules($config);
				if($this->form_validation->run() == FALSE){
					$this->load->view('profile/vdo_edit',$data);
				}else{
				
					$vdoid = $this->input->post('id');
                    $vdotitle = $this->input->post('vtitle');
                    
                    $description = $this->input->post('vdescription');
                    $size = $this->input->post('vsize');
                    $extention = $this->input->post('vextention');
                    $lenght = $this->input->post('vlenght');
                    $path = $this->input->post('vpath');
					
					$thumbnail = $this->input->post('vthumbnail');
                    $views = $this->input->post('vviews');
					$likes = $this->input->post('vlikes');
					$status = $this->input->post('vstatus');

                    $vdodata= $this->mod_profile->updateVDO($vdoid , $vdotitle,  $description, $size, $extention, $lenght, $path, $thumbnail , $views ,$likes,$status);
					if ($vdodata > 0) {
						redirect ('profile');	
					}
						
					
				}
				
		}

}
	

function delete_vdo($id){
	   $this->mod_profile->deletevdo($id);
	   redirect ('profile');	
	}

}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
