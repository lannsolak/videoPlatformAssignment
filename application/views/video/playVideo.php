<!--Newest-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Play video</h3>
            </div>
        </div>
<?php
        if ($playvdo->num_rows() > 0) {
            foreach ($playvdo->result() as $row) {
				
				?>
                	
                  <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="row">	
                                <video width="1100" height="400" controls autoplay>
                                  <source src="<?php echo site_url().'videos/' . $row->path; ?>" type="video/mp4">
                                </video>
                            
	                        <div class="caption">
	                            <h4><a href="#"><?php echo $row->title; ?></a></h4>
	                            <p><?php echo $row->description; ?></p>
                                <p class="pull-right">
                                    <a href="#" data-toggle="modal" data-target="#basicModal">Rate this video</a>
                                 </p>
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
			<?php
                  }
                    }else{
							echo "No record found!";
					}
            ?>

        </div>
    </div>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Provide us detail</h4>
            </div>
            <div class="modal-body">
                    <?php echo form_open(); ?>
                        <p>
                        <label>You Email : </label>
                        <?php echo form_input("voter",'','class="form-control"'); ?>
                        </p>
                        <p>
                        <label>Your opinion</label>
                        <?php 
							$option = array(
								'name' => 'opion',
								'id'   => 'opion',
								'value'=> '',
								'rows' => '5',
								'class'=> 'form-control'
								
							);
							echo form_textarea($option); 
						?>
                        </p>
                        <p>
                        <?php echo form_hidden("vdoId",$row->id); ?>
                     	</p>
                 	<?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php echo anchor("video/rating", "Submit", "class='btn btn-primary'"); ?>
            </div>
        </div>
    </div>
</div>

<div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-width="100%" data-numposts="5" data-colorscheme="light"></div>