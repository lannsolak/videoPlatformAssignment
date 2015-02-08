<!--Newest-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Newest Videos</h3>
            </div>
        </div>
<?php
        if ($newVideo->num_rows() > 0) {
            foreach ($newVideo->result() as $row) {
				
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
                    }else{
							echo "No record found!";
					}
            ?>

        </div>
    </div>
    <a href="<?php echo base_url("video/newvideo"); ?>" class="btn btn-link pull-right">View all...</a>
</div>



<!--Contest-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Contest Videos</h3>
            </div>
        </div>
<?php
        if ($videosInContest->num_rows() > 0) {
            foreach ($videosInContest->result() as $row) {
				
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
                    }else{
							echo "No record found!";
					}
            ?>

        </div>
    </div>
    <a href="<?php echo base_url("video/contestvideo"); ?>" class="btn btn-link pull-right">View all...</a>
</div>


<!--Popular-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Popular Videos</h3>
            </div>
        </div>
<?php
        if ($videosInPopular->num_rows() > 0) {
            foreach ($videosInPopular->result() as $row) {
				
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
                    }else{
							echo "No record found!";
					}
            ?>

        </div>
    </div>
    <a href="<?php echo base_url("video/popularvideo"); ?>" class="btn btn-link pull-right">View all...</a>
</div>