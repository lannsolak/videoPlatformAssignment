<div class="container">
	<h3 align="center">Login Form</h3>
	<div id="login">
		<form action="<?php echo base_url("user/login"); ?>" method="POST">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" name="email" placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-info">Login</button>
		</form>
	</div>
</div>