<div class="container-fluid">
    <div class="row">
		<?php
        if ($allpopularvdos->num_rows() > 0) {
            foreach ($allpopularvdos->result() as $row) {
		?>
            <div class="col-sm-2">
               <div class="thumbnail">
                    <?php echo anchor("video/playVideo/".$row->id, img("uploaded/".$row->thumbnail)); ?>
                    <div class="caption">
                        <h4><?php echo anchor("video/playVideo/".$row->id, $row->title); ?></h4>
                    </div>
                    <div class="ratings">
                        <p class="pull-right"><?php echo $row->views; ?> views</p>
                        <p><?php echo $row->likes; ?> likes</p>
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
    <nav>
        <ul class="pagination">
            <?php echo $pagination; ?>
        </ul>
    </nav>
</div>
