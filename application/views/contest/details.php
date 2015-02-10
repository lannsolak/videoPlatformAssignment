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
        $this->session->set_userdata("userName", "Solak Lann");

        if($this->session->userdata("userId")) {
            $isDisable = null;
        } else {
            $isDisable = 'disabled';
        }
    ?>
    <div class="col-sm-6">
        <h3 class="h3">
            <button class="btn btn-xs btn-success pull-right" <?php echo $isDisable; ?>  data-toggle="modal" data-target="#enrollModel">Enroll now</button>
            <?php echo ucfirst($title); ?>
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
        <?php $hidden = array("userId" => $this->session->userdata("userId"), "contestId" => $id); ?>
        <?php echo form_open_multipart('contest/enrollContest', array('class'=>'form-horizontal'), $hidden); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-labal="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>ENROLL NOW</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="user" class="col-sm-3 control-label">Your Name  <span class="required">*</span>: </label>
                    <div class="col-sm-8">
                      <?php
                        $userInputAttribute = array(
                            'name'        => 'user',
                            'id'          => 'user',
                            'value'       => $this->session->userdata("userName"),
                            'class'       => 'form-control',
                            'readonly'    => 'readonly',
                        );
                        echo form_input($userInputAttribute);
                       ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contest" class="col-sm-3 control-label">Contest  <span class="required">*</span>: </label>
                    <div class="col-sm-8">
                      <?php
                        $contestInputAttribute = array(
                            'name'        => 'contest',
                            'id'          => 'contest',
                            'value'       => $title,
                            'class'       => 'form-control',
                            'readonly'    => 'readonly',
                        );
                        echo form_input($contestInputAttribute);
                       ?>
                    </div>
                </div>
                <div class="form-group video-select">
                    <label for="contest" class="col-sm-3 control-label">Your videos : </label>
                    <div class="col-sm-8">
                      <?php
                        $options = array(''   => '--- select ---');
                        if($userVideoList != null) {
                            foreach($userVideoList->result() as $video){
                                $options[$video->id] = $video->title;
                            }
                        }
                        echo form_dropdown('videoId', $options, '', 'class="form-control video-dropdown-list"');
                       ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-8">
                                &nbsp; &nbsp;<input type="checkbox" name="new_upload" id="new_upload"> or you upload a new videos !!!
                            </div>
                        </div>
                    </div>
                </div>

                <div id="uploadNew">
                    <div class="form-group">
                        <label for="videotitle" class="col-sm-3 control-label">Video title  <span class="required">*</span>: </label>
                        <div class="col-sm-8">
                          <?php
                            $contestInputAttribute = array(
                                'name'        => 'videotitle',
                                'id'          => 'videotitle',
                                'value'       => "",
                                'class'       => 'form-control video-title',
                            );
                            echo form_input($contestInputAttribute);
                           ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="videofiles" class="col-sm-3 control-label"> Video upload <span class="required">*</span>: </label>
                        <div class="col-sm-8">
                          <?php
                            $uploadInputAttribute = array(
                                'name'        => 'videofiles',
                                'id'          => 'videofiles',
                                'value'       => '',
                                'class'       => 'form-control upload-video',
                            );
                            echo form_upload($uploadInputAttribute);
                           ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="thumbfile" class="col-sm-3 control-label">Thumbnails <span class="required">*</span>: </label>
                        <div class="col-sm-8">
                          <?php
                            $thumpInputAttribute = array(
                                'name'        => 'thumbfile',
                                'id'          => 'thumbfile',
                                'value'       => '',
                                'class'       => 'form-control thumb-file',
                            );
                            echo form_upload($uploadInputAttribute);
                           ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="videodescription" class="col-sm-3 control-label">Description : </label>
                        <div class="col-sm-8">
                          <?php
                            $descriptionInputAttribute = array(
                                'name'        => 'videodescription',
                                'id'          => 'videodescription',
                                'value'       => '',
                                'class'       => 'form-control video-description',
                                'rows'        => '3',
                            );
                            echo form_textarea($descriptionInputAttribute);
                           ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment" class="col-sm-3 control-label">Comment : </label>
                    <div class="col-sm-8">
                      <?php
                        $commentInputAttribute = array(
                            'name'        => 'comment',
                            'id'          => 'comment',
                            'value'       => '',
                            'class'       => 'form-control comment',
                            'rows'        => '3',
                        );
                        echo form_textarea($commentInputAttribute);
                       ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php echo form_submit('btnSubmitEnroll','Submit', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
