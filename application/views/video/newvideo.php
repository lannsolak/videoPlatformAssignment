<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">         
		<?php
        if ($AllNewVideos->num_rows() > 0) {
            foreach ($AllNewVideos->result() as $row) {				
		?>                	
             <div class="col-sm-3 col-lg-3 col-md-3">
                <div class="row">	
	              <div class="thumbnail">
                  	<a target="_blank" href="<?php echo site_url('video/playVideo').'/'.$row->id; ?>">
                      <img width="282" height="160" src="<?php echo site_url().'videos/Thumbnails/' . $row->thumbnail; ?>" />
                    </a>
                    <div class="caption">
                        <h4><a href="#"><?php echo $row->title; ?></a>
                        </h4>
                        <p><?php echo $row->description; ?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right"><?php echo $row->views; ?> reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                    </div>
	              </div>
               </div>
			</div>    
			<?php
                  }
			}else{
					echo "No record found!";
			}
            ?>
        </div>
    </div>
   <ul class="pagination"><li class="active"></li><li><?php echo $pagination; ?></li></ul>
</div>