
<?php 

$this->load->view('inc/header');

$uri = $this->uri->segment(2);

if($uri != ""){
    $this->load->view($uri.'/'.$uri);
}
else{
    $this->load->view('profile/user_profile');
}

$this->load->view('inc/footer');

?>
