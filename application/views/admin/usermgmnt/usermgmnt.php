<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa fa-users"></i> Users Management
        </h1>
    </div>
</div>
<div class="col-sm-12">
	<div class="row">
	    <?php
	        $uri = $this->uri->segment(1);
	        $uri2 = $this->uri->segment(2);

	        if($uri2 != ""){
	            $this->load->view('admin/'.$uri.'/'.$uri2);
	        }else{
	            $this->load->view('admin/'.$uri.'/userlist');
	        }
        ?>
	</div>
</div>


