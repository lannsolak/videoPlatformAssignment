<?php
$this->load->view('inc/header');

$uri = $this->uri->segment(1);
if(isset($page)){
	$this->load->view($page);
}else{
	if($uri != ""){
	    $this->load->view($uri.'/'.$uri);
	}else{
	    $this->load->view('home/home');
	}
}

$this->load->view('inc/footer');
?>
