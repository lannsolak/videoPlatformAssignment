<?php
  $title = null;
  $status = '';
  $description = null;
  $prize = null;
  $contact_detail = null;

  if($contestToEdit->num_rows() > 0){
    foreach($contestToEdit->result() as $contest){
      $title = $contest->title;
      $status = strtolower($contest->status);
      $description = $contest->description;
      $prize = $contest->prize;
      $contact_detail = $contest->contact_detail;
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
      <label for="title" class="col-sm-2 control-label">Title : </label>
      <div class="col-sm-9">
        <?php echo form_input("title", $title, 'class="form-control" placeholder="name"'); ?>
      </div>
    </div>

    <div class="form-group">
      <label for="status" class="col-sm-2 control-label">Status : </label>
      <div class="col-sm-9">
        <?php
          $option =  array(''=>'-- select --', 'draft'=>'Draft', 'new'=>'New', 'progress'=>'Progress', 'close'=>'Close');
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
            'placeholder' => "your description",
            'rows' => "3",
            'value' => $description,
          );
          echo form_textarea($descAttribute);
        ?>
      </div>
    </div>

    <div class="form-group">
      <label for="Prize" class="col-sm-2 control-label">Prize : </label>
      <div class="col-sm-9">
        <?php
          $prizeAttribute = array(
            'name' => 'prize',
            'class' => 'form-control',
            'placeholder' => "describe prize",
            'rows' => "3",
            'value' => $prize,
          );
          echo form_textarea($prizeAttribute);
        ?>
      </div>
    </div>

    <div class="form-group">
      <label for="contact" class="col-sm-2 control-label">Organizer Contact : </label>
      <div class="col-sm-9">
        <?php
          $contactAttribute = array(
            'name' => 'contact',
            'class' => 'form-control',
            'placeholder' => "organizer contact...",
            'rows' => "3",
            'value' => $contact_detail,
          );
          echo form_textarea($contactAttribute);
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <?php echo form_submit('editContestSubmit','Save Change','class="btn btn-primary"'); ?>
        <?php echo anchor("contestmgmnt/", "Cancel", 'class="btn btn-default"'); ?>
      </div>
    </div>
  <?php echo form_close(); ?>
  <div>&nbsp;</div>
</div>
