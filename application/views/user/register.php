<div class="container">
	<h3 align="center">Registration Form</h3>
	<div class="user-form">
		<form action="<?php echo base_url("user/register"); ?>" method="POST">
			<div class="form-group">
				<label for="name">Name:</label>
				<span class="error-sms">* <?php echo form_error('name'); ?></span>
				<input type="text" class="form-control" name="name" placeholder="Enter Name">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<span class="error-sms">* <?php echo form_error('email'); ?></span>
				<input type="email" class="form-control" name="email" placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<span class="error-sms">* <?php echo form_error('password'); ?></span>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="confirmPassword">Confirm Password:</label>
				<span class="error-sms">* <?php echo form_error('confirm_password'); ?></span>
				<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
			</div>
			<div class="form-group">
				<label for="gender">Gender:</label>
				<span class="error-sms">* <?php echo form_error('sex'); ?></span>
				<div class="radio">
			  	<label>
				    <input type="radio" name="sex" value="Female"> Female
			  	</label>
			  	<label>
				    <input type="radio" name="sex" value="Male"> Male
			  	</label>
			</div>
			</div>
			<div class="form-group">
				<label for="country">Country:</label>
				<span class="error-sms">* <?php echo form_error('country'); ?></span>
				<input type="text" class="form-control" name="coulontry" placeholder="Country">
			</div>
			<div class="form-group">
				<label for="city">City:</label>
				<span class="error-sms">* <?php echo form_error('city'); ?></span>
				<input type="text" class="form-control" name="city" placeholder="City">
			</div>
			<div class="form-group">
				<label for="zipCode">Zip Code:</label>
				<input type="text" class="form-control" name="zip_code" placeholder="Zip Code">
			</div>
			<div class="form-group">
				<label for="phoneNumber">Phone Number:</label>
				<span class="error-sms">* <?php echo form_error('phone_number'); ?></span>
				<input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
			</div>
			<div class="form-group">
				<label for="skill">Skill:</label>
				<input type="text" class="form-control" name="skill" placeholder="Skill">
			</div>
			<div class="form-group">
				<label for="interest">Interest:</label>
				<input type="text" class="form-control" name="interest" placeholder="Interest">
			</div>
			<p><b>Note:</b> <span style="color: red;">* is required!</span></p>

			<button type="submit" class="btn btn-info">Register</button>
			<button type="reset" class="btn btn-info">Reset</button>
		</form>
	</div>
</div>