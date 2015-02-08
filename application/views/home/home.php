<!-- Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php var_dump($contestVideos); ?>
            <div class="jumbotron hero-spacer">
	            <h1>COVP Video Platform</h1>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
	            <p><a class="btn btn-primary btn-large">Call to action!</a></p>
        	</div>
			<hr>
            <div class="row">
            <!-- all video -->
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <h3><?php echo anchor("video/popularvideo", "Latest Video"); ?></h3>
                    <div class="row">
                        <?php 
                            foreach ($newVideos->result() as $newVideo){                             
                        ?>
                        <div class="col-sm-6 col-lg-6 col-md-6">
	                    <div class="thumbnail">
                            <?php echo anchor("video/play/".$newVideo->id, img("uploaded/images/".$newVideo->thumbnail)); ?>
                            <h4><?php echo anchor("video/play/".$newVideo->id, $newVideo->title); ?></h4>	                        
	                        <div class="ratings">
	                            <p class="pull-right"><?php echo $newVideo->views; ?> views</p>
                                <p><?php echo $newVideo->likes; ?> likes</p>
	                        </div>
	                    </div>
	                   </div>
                        <?php } ?>
	                </div><!-- end of row -->
                    <h4><?php echo anchor("video/newvideo", "View All"); ?></h4>
                </div>
                <!-- end of all videos -->
                <!-- all popular videos -->
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <h3><?php echo anchor("video/popularvideo", "Popular videos"); ?></h3>
                	<div class="row">
                        <?php 
                            foreach ($popularVideos->result() as $popularVideo){                             
                        ?>
                        <div class="col-sm-6 col-lg-6 col-md-6">
    	                    <div class="thumbnail">
                                <?php echo anchor("video/play/".$popularVideo->id, img("uploaded/images/".$popularVideo->thumbnail)); ?>
    	                        <h4><?php echo anchor("video/play/".$popularVideo->id, $popularVideo->title); ?></h4>
    	                        <div class="ratings">
    	                            <p class="pull-right"><?php echo $popularVideo->views; ?> views</p>
                                    <p><?php echo $popularVideo->likes; ?> likes</p>
    	                        </div>
    	                    </div>
    	                </div>
                        <?php } ?>        
	                </div><!-- end of row -->
                    <h4><?php echo anchor("video/popularvideo", "View All"); ?></h4>
                </div>
                <!-- end of all popular videos -->
                <!-- videos contest -->
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <h3><?php echo anchor("video/contestvideo", "New video in Contest"); ?></h3>
                	<div class="row">
                        <?php 
                            foreach ($contestVideos->result() as $contestVideo){                             
                        ?>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="thumbnail">
                                <?php echo anchor("video/play/".$contestVideo->id, img("uploaded/images/".$contestVideo->thumbnail)); ?>
                                <h4><?php echo anchor("video/play/".$contestVideo->id, $contestVideo->title); ?></h4>
                                <div class="ratings">
                                    <p class="pull-right"><?php echo $contestVideo->views; ?> views</p>
                                    <p><?php echo $contestVideo->likes; ?> likes</p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
	                </div><!-- end of row -->
                    <h4><?php echo anchor("video/contestvideo", "View All"); ?></h4>
                </div>
                <!-- end of video contest -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
