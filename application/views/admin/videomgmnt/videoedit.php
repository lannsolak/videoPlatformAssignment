<?php
  $title = null;
  $description = null;
  $status = '';

  if($videoToEdit->num_rows() > 0){
    foreach($videoToEdit->result() as $video){
      $title = $video->title;
      $description = $video->description;
      $status = strtolower($video->status);
    }
  }
?>
<div class="form-horizontal">
  <?php if(isset($updated)) { ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php echo $updated; ?>
    </div>
  <?php } ?>
  <?php echo form_open(); ?>
    <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Email : </label>
      <div class="col-sm-9">
        <?php echo form_input("title", $title, 'class="form-control" placeholder="title"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="status" class="col-sm-2 control-label">Status : </label>
      <div class="col-sm-9">
        <?php
          $option =  array(''=>'-- select --', 'new'=>'New', 'public'=>'Public');
          echo form_dropdown("status",$option,$status,'class="form-control"');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Description : </label>
      <div class="col-sm-9">
        <?php
          $descAttribute = array(
            'name' => 'description',
            'class' => 'form-control',
            'placeholder' => "Your description",
            'rows' => "3",
            'value' => $description,
          );
          echo form_textarea($descAttribute);
        ?>
      </div>
    </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <?php echo form_submit('editVideoSubmit','Save Change','class="btn btn-primary"'); ?>
        <?php echo anchor("videomgmnt/", "Cancel", 'class="btn btn-default"'); ?>
      </div>
    </div>
  <?php echo form_close(); ?>
  <div>&nbsp;</div>
</div>
