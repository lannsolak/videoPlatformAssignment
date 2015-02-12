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
                <th>Prize</th>
                <th>Organizer</th>
                <th>Schedule</th>
                <th>Status</th>
                <th width="65">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if($contestList->num_rows() > 0){
                foreach($contestList->result() as $contest) {
        ?>
                    <tr>
                        <td><?php echo $contest->id; ?></td>
                        <td><?php echo $contest->title; ?></td>
                        <td><?php echo word_limiter(strip_tags($contest->description), 9); ?></td>
                        <td><?php echo word_limiter(strip_tags($contest->prize), 9); ?></td>
                        <td><?php echo word_limiter(strip_tags($contest->contact_detail), 9); ?></td>
                        <td>
                            <?php
                                if($contest->schedules_id){
                                    echo anchor("contestmgmnt/changeschedule/contest_".$contest->id, "modify schedule", 'class="btn btn-xs btn-success"');
                                } else {
                                    echo anchor("contestmgmnt/scheduleadd/".$contest->id, "add schedule", 'class="btn btn-xs btn-primary"');
                                }
                            ?>
                        </td>
                        <td><?php echo ucfirst($contest->status); ?></td>
                        <td>
                            <?php echo anchor("contestmgmnt/contestedit/".$contest->id , '<i class="fa fa-fw fa-pencil-square-o"></i>'); ?>
                             |
                            <?php echo anchor("contestmgmnt/contestdelete/".$contest->id , '<i class="fa fa-fw fa-trash-o"></i>'); ?>
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
