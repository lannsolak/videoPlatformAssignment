<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">         
		<?php
        if ($allcontestvdos->num_rows() > 0) {
            foreach ($allcontestvdos->result() as $row) {				
		?>                	
             <div class="col-sm-3 col-lg-3 col-md-3">
                <div class="row">	
	              <div class="thumbnail">
                    <video width="282" height="160" controls>
                      <source src="<?php echo site_url().'videos/' . $row->thumbnail; ?>" type="video/mp4">
                    </video>
                    <div class="caption">
                        <h4><a href="#"><?php echo $row->title; ?></a>
                        </h4>
                        <p><?php echo $row->description; ?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">15 reviews</p>
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
			echo $pagination;
			}else{
					echo "No record found!";
			}
            ?>
        </div>
    </div>
    
</div>