<div class="col-sm-8">
    <?php
        $id = null; $title = "No title"; $describe = null; $prize = null; $contact = null; $status = null; $startenrolling = null; 
        $closeenrolling = null; $openvoting = null; $result = null; 
        if($detailsContest->num_rows() > 0) {
            foreach ($detailsContest->result() as $dc) {
                $id = $dc->id;
                $title = $dc->title;
                $describe = $dc->description;
                $prize = $dc->prize;
                $contact = $dc->contact_detail;
                $status = $dc->status;
                $startenrolling = $dc->startdate;
                $closeenrolling = $dc->enddate;
                $votingdue = $dc->endvotedate;
                $result = $dc->resultdate;
            }
        }
        $this->session->set_userdata("userId", 1);
        if($this->session->userdata("userId")) {
            $isDisable = null;
        } else {
            $isDisable = 'disabled';
        }
    ?>
    <div class="col-sm-6">
        <h3 class="h3">
            <button class="btn btn-xs btn-success pull-right" <?php echo $isDisable; ?>  data-toggle="modal" data-target="#enrollModel">Enroll now</button>
            <?php echo $title; ?>
        </h3>
        <hr class="clear" />
        <p class="d-title-describe">Description</p>
        <p class="d-text-describe"><?php echo $describe; ?></p>
        <?php if(($status != "draft") AND ($status != "close")) { ?>
            <hr />
            <button class="btn btn-xs btn-success pull-right" <?php echo $isDisable; ?> data-toggle="modal" data-target="#enrollModel">Enroll now</button>
        <?php } ?>
    </div>
    <div class="col-sm-6 cd-info-wrapper">

        <p class="d-title-schedule">Prize</p>
        <table class="table">
            <tr>
                <td class="title" colspan="3">
                    <?php echo $prize; ?>
                </td>
            </tr>
            <tr>
                <td></td><td></td><td></td>
            </tr>
        </table>

        <p class="d-title-schedule">Schedule</p>
        <table class="table">
            <tr>
                <td class="title">Start enrolling</td>
                <td>:</td>
                <td><?php echo date ( "d M Y", strtotime($startenrolling)); ?></td>
            </tr>
            <tr>
                <td class="title">Close enrolling</td>
                <td>:</td>
                <td><?php echo date ( "d M Y", strtotime($closeenrolling)); ?></td>
            </tr>
            <tr>
                <td class="title">Voting Due</td>
                <td>:</td>
                <td>
                    <?php echo date ( "d M Y", strtotime($closeenrolling)); ?>
                    -
                    <?php echo date ( "d M Y", strtotime($votingdue)); ?>
                </td>
            </tr>
            <tr>
                <td class="title">Result</td>
                <td>:</td>
                <td><?php echo $result; ?></td>
            </tr>
            <tr>
                <td></td><td></td><td></td>
            </tr>
        </table>

        <p class="d-title-schedule">Additional Information</p>
        <table class="table">
            <tr>
                <td class="title">Status</td>
                <td>:</td>
                <td><?php echo ucfirst($status); ?></td>
            </tr>
            <tr>
                <td class="title">Organizer Contact</td>
                <td>:</td>
                <td><?php echo $contact; ?></td>
            </tr>
            <tr>
                <td></td><td></td><td></td>
            </tr>
        </table>
    </div>
</div>

<!-- model enroll contest -->
<div class="modal fade" id="enrollModel" tabindex="-1" role="dialog" aria-lablledby="enrollModelLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-labal="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>ENROLL NOW</h4>
            </div>
            <div class="modal-body">
                <?php 
                    echo form_open_multipart('contest/enroll');

                    echo form_close();
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>