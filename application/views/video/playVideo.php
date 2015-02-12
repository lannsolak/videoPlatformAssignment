<?php
    $vid = 0;
    $title = null;
    $description = null;
    $views = 0;
    $likes = 0;
    if ($playvdo->num_rows() > 0) {
        foreach ($playvdo->result() as $row) {
            $vid = $row->id;
            $title = $row->title;
            $description = $row->description;
            $views = $row->views;
            $likes = $row->likes;
        }
    }
?>
<div class="container-fluid">
    <?php if($this->session->userdata("success_vote")) { ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <?php
            echo $this->session->userdata("success_vote");
            $this->session->unset_userdata("success_vote");
          ?>
        </div>
    <?php } ?>
    <?php if($this->session->userdata("problem_vote")) { ?>
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <?php
            echo $this->session->userdata("problem_vote");
            $this->session->unset_userdata("problem_vote");
          ?>
        </div>
    <?php } ?>
    <div class="col-md-9">
        <h3 class="h3"><?php echo $row->title; ?></h3>
        <hr />
        <div class="video-wrapper" style="margin: 0 auto; text-align: center; background: #000;">
            <video width="80%" controls autoplay>
                <source src="<?php echo site_url($row->path); ?>" type="video/mp4">
            </video>
        </div>
        <hr />
        <div class="vComponent">
            <span class="col-sm-2">
                <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
                <span class="number-views"><?php echo $views; ?></span>
            </span>
            <span class="col-sm-2">
                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <span class="number-likes"><?php echo $likes; ?></span>
            </span>
            <?php if(isset($ecid)){ ?>
            <span class="col-sm-offset-6 col-sm-2" style="text-align: right;">
                <span class="number-vote"><?php echo $voteCount; ?></span>
                <span class="glyphicon glyphicon-thumbs-up" data-toggle="modal" data-target="#voteModel" style="cursor: pointer;"></span>
            </span>
            <?php } ?>
        </div>
        <div style="clear:both">&nbsp;</div>
        <hr />
        <div class="description">
            <p class="d-title-describe">Description</p>
            <hr />
            <p class="d-text-describe"><?php echo $description; ?></p>
        </div>
        <div style="clear:both">&nbsp;</div>
        <div class="social-comments">
            <div
                class="fb-comments"
                data-href="http://developers.facebook.com/docs/plugins/comments/"
                data-width="100%" data-numposts="5" data-colorscheme="light">
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <h3 class="h3">You might like this</h3>
        <hr />
    </div>
</div>


<!-- model enroll contest -->
<div class="modal fade" id="voteModel" tabindex="-1" role="dialog" aria-lablledby="voteModelLable" aria-hidden="true">
    <div class="modal-dialog">
        <!-- open form multipart -->
        <?php echo form_open_multipart("video/vote/".$vid); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-labal="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Give us your thinking on this video : </h4>
            </div>
            <div class="modal-body form-horizontal">
                <?php
                    if(isset($ecid)){
                        echo form_hidden('enrollContestId', $ecid);
                    }
                ?>
                <div class="form-group">
                    <label for="visitoremail" class="col-sm-3 control-label">Your Email  <span class="required">*</span>: </label>
                    <div class="col-sm-8">
                      <?php
                        $emailInputAttribute = array(
                            'name'        => 'visitoremail',
                            'id'          => 'visitoremail',
                            'value'       => '',
                            'class'       => 'form-control visitoremail',
                        );
                        echo form_input($emailInputAttribute);
                       ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="thinking" class="col-sm-3 control-label">Your Feeling : </label>
                    <div class="col-sm-8">
                      <?php
                        $thinkingInputAttribute = array(
                            'name'        => 'thinking',
                            'id'          => 'thinking',
                            'value'       => '',
                            'class'       => 'form-control thinking',
                            'rows'        => '3',
                        );
                        echo form_textarea($thinkingInputAttribute);
                       ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php echo form_submit('btnSubmitVote','Submit', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
