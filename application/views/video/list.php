<!--Newest-->
<div class="container-fluid">
    <h3 class="h3 h3title">
        <?php echo anchor("video/newvideo", "Current Upload"); ?>
        <?php echo anchor("video/newvideo", "view all", 'class="btn btn-success btn-sm pull-right"'); ?>
    </h3>
    <hr />
    <div class="row">
    <?php
    if ($newVideo->num_rows() > 0) {
        foreach ($newVideo->result() as $row) {
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
</div>

<!--Popular-->
<div class="container-fluid">
    <h3 class="h3 h3title">
        <?php echo anchor("video/popularvideo", "Popular Videos"); ?>
        <?php echo anchor("video/popularvideo", "view all", 'class="btn btn-success btn-sm pull-right"'); ?>
    </h3>
    <hr />
    <div class="row">
    <?php
        if ($videosInPopular->num_rows() > 0) {
            foreach ($videosInPopular->result() as $row) {
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
</div>

<!--Contest-->
<div class="container-fluid">
    <h3 class="h3 h3title">
        <?php echo anchor("video/contestvideo", "Videos Competing"); ?>
        <?php echo anchor("video/contestvideo", "view all", 'class="btn btn-success btn-sm pull-right"'); ?>
    </h3>
    <hr />
    <div class="row">
        <?php
        if ($videosInContest->num_rows() > 0) {
            foreach ($videosInContest->result() as $row) {
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
</div>
