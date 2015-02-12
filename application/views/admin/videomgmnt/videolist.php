<div class="table-responsive">
    <?php if($this->session->userdata("success")) { ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <?php
                echo $this->session->userdata("success");
                $this->session->unset_userdata("success");
            ?>
        </div>
    <?php } ?>
    <?php if($this->session->userdata("problem")) { ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <?php
                echo $this->session->userdata("problem");
                $this->session->unset_userdata("problem");
            ?>
        </div>
    <?php } ?>
    <div style="clear:both;">&nbsp;</div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Thumbnail</th>
                <th>Size</th>
                <th>Date</th>
                <th>View</th>
                <th>Like</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if($videoList->num_rows() > 0){
                foreach($videoList->result() as $video) {
                    $img = array('src' => "uploaded/".$video->thumbnail,'alt' => $video->title,'class' => 'sm-thumb');
        ?>

                    <tr>
                        <td><?php echo $video->id; ?></td>
                        <td><?php echo $video->title; ?></td>
                        <td><?php echo $video->description; ?></td>
                        <td><?php echo img($img); ?></td>
                        <td><?php echo $video->size; ?></td>
                        <td><?php echo date ( "d M Y", strtotime($video->upload_date)); ?></td>
                        <td><?php echo $video->views; ?></td>
                        <td><?php echo $video->likes; ?></td>
                        <td>
                            <?php echo anchor("videomgmnt/videoedit/".$video->id , '<i class="fa fa-fw fa-pencil-square-o"></i>'); ?>
                             |
                            <?php echo anchor("videomgmnt/videodelete/".$video->id , '<i class="fa fa-fw fa-trash-o"></i>'); ?>
                            <?php
                                if(strtolower($video->status) == "new"){
                                    echo " | ".anchor("videomgmnt/videostatus/".$video->id , '<i class="fa fa-fw fa-flag"></i>');
                                }
                            ?>
                        </td>
                    </tr>
        <?php
                }
            } else {

            }
        ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <?php echo $pagination; ?>
        </ul>
    </nav>
</div>
