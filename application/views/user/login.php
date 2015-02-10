<div class="container">
	<h3 align="center">Login Form</h3>
	<div class="user-form">
		<form action="<?php echo base_url("user/login"); ?>" method="POST">
			<div class="form-group">
				<label for="email">Email:</label>
				<span class="error-sms">* <?php echo form_error('email'); ?></span>
				<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<span class="error-sms">* <?php echo form_error('password'); ?></span>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-info">Login</button>
			<button type="reset" class="btn btn-info">Cancel</button>
		</form>
	</div>
</div>