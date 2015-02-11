<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa fa-users"></i> Users Management
            <?php echo anchor("usermgmnt/useradd", "Add New", 'class="btn btn-success btn-md pull-right"'); ?>
        </h1>
    </div>
</div>
<div class="col-sm-12">
	<div class="row">
	    <?php
	        $uri = $this->uri->segment(1);
	        $uri2 = $this->uri->segment(2);

	        if($uri2 != "" AND $uri2 != "index"){
	            $this->load->view('admin/'.$uri.'/'.$uri2);
	        }else{
	            $this->load->view('admin/'.$uri.'/userlist');
	        }
        ?>
	</div>
</div>


