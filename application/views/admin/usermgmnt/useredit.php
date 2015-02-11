<?php 
  $name = null;
  $email = null;
  $gender = null;
  $phone = null;
  $country = null;
  $city = null;
  $zipcode = null;
  $skill = null;
  $interest = null;

  if($userToEdit->num_rows() > 0){
    foreach($userToEdit->result() as $user){
      $name = $user->name;
      $email = $user->email;
      $gender = strtolower($user->gender);
      $phone = $user->phone;
      $country = $user->country;
      $city = $user->city;
      $zipcode = $user->zipcode;
      $skill = $user->skill;
      $interest = $user->interest;
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
      <label for="name" class="col-sm-2 control-label">Name : </label>
      <div class="col-sm-9">
        <?php echo form_input("name", $name, 'class="form-control" placeholder="name"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email : </label>
      <div class="col-sm-9">
        <?php echo form_input("email", $email, 'class="form-control" placeholder="someone@example.com"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="gender" class="col-sm-2 control-label">Gender : </label>
      <div class="col-sm-9">
        <?php 
          $option =  array(''=>'-- select --', 'm'=>'Male', 'f'=>'Female');
          echo form_dropdown("gender",$option,$gender,'class="form-control"'); 
        ?>
      </div>
    </div>    
    <div class="form-group">
      <label for="phone" class="col-sm-2 control-label">Phone : </label>
      <div class="col-sm-9">
        <?php echo form_input("phone", $phone , 'class="form-control" placeholder="xxxxxxxxxx"'); ?>
      </div>
    </div>    
    <div class="form-group">
      <label for="contry" class="col-sm-2 control-label">Country : </label>
      <div class="col-sm-9">
        <?php echo form_input("country", $country, 'class="form-control" placeholder="country"'); ?>
      </div>
    </div>    
    <div class="form-group">
      <label for="city" class="col-sm-2 control-label">City : </label>
      <div class="col-sm-9">
        <?php echo form_input("city", $city, 'class="form-control" placeholder="city"'); ?>
      </div>
    </div>   
    <div class="form-group">
      <label for="zipcode" class="col-sm-2 control-label">Zipcode : </label>
      <div class="col-sm-9">
        <?php echo form_input("zipcode", $zipcode, 'class="form-control" placeholder="zipcode"'); ?>
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
            'value' => $skill,
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
            'value' => $interest,
          );
          echo form_textarea($interestAttribute); 
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <?php echo form_submit('editUserSubmit','Save Change','class="btn btn-primary"'); ?>
        <?php echo anchor("usermgmnt/", "Cancel", 'class="btn btn-default"'); ?> 
      </div>
    </div>
  <?php echo form_close(); ?>
</div>
