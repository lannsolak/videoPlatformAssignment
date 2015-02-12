<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa fa-play-circle"></i> Videos Management
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
	            $this->load->view('admin/'.$uri.'/videolist');
	        }
        ?>
	</div>
</div>


