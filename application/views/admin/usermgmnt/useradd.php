<div class="form-horizontal">
  <?php if(isset($inserted)) { ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php echo $inserted; ?>
    </div>
  <?php } ?>
  <?php echo form_open(); ?>
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Name : </label>
      <div class="col-sm-9">
        <?php echo form_input("name", '', 'class="form-control" placeholder="name"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email : </label>
      <div class="col-sm-9">
        <?php echo form_input("email", '', 'class="form-control" placeholder="someone@example.com"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password : </label>
      <div class="col-sm-9">
        <?php echo form_password("password", '', 'class="form-control" placeholder="password"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="gender" class="col-sm-2 control-label">Gender : </label>
      <div class="col-sm-9">
        <?php
          $option =  array(''=>'-- select --', 'm'=>'Male', 'f'=>'Female');
          echo form_dropdown("gender",$option,'','class="form-control"');
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="phone" class="col-sm-2 control-label">Phone : </label>
      <div class="col-sm-9">
        <?php echo form_input("phone", '' , 'class="form-control" placeholder="xxxxxxxxxx"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="contry" class="col-sm-2 control-label">Country : </label>
      <div class="col-sm-9">
        <?php echo form_input("country", '', 'class="form-control" placeholder="country"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="city" class="col-sm-2 control-label">City : </label>
      <div class="col-sm-9">
        <?php echo form_input("city", '', 'class="form-control" placeholder="city"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="zipcode" class="col-sm-2 control-label">Zipcode : </label>
      <div class="col-sm-9">
        <?php echo form_input("zipcode", '', 'class="form-control" placeholder="zipcode"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="skill" class="col-sm-2 control-label">Skill : </label>
      <div class="col-sm-9">
        <?php
          $skillAttribute = array(
            'name' => 'skill',
            'class' => 'form-control',
            'placeholder' => "your skill",
            'rows' => "3",
            'value' => '',
          );
          echo form_textarea($skillAttribute);
        ?>
      </div>
    </div>
    <div class="form-group">
      <label for="interest" class="col-sm-2 control-label">Interest : </label>
      <div class="col-sm-9">
        <?php
          $interestAttribute = array(
            'name' => 'interest',
            'class' => 'form-control',
            'placeholder' => "your interest",
            'rows' => "3",
            'value' => '',
          );
          echo form_textarea($interestAttribute);
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <?php echo form_submit('createUserSubmit','Save Change','class="btn btn-primary"'); ?>
        <?php echo anchor("usermgmnt/", "Cancel", 'class="btn btn-default"'); ?>
      </div>
    </div>
  <?php echo form_close(); ?>
  <div>&nbsp;</div>
</div>
