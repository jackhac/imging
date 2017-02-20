<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<div class="form-signin well">
				<center><h1 class="form-signin-heading">Register</h1></center><br>
				<font size="3" color="red"><?php echo validation_errors(); ?></font>
				<?php echo form_open_multipart('account/register');?>
					<input type="text" size="20" id="username" name="username" placeholder="Username" class="form-control"/>
					<br/>
					<input type="text" size="20" id="email" name="email" placeholder="Email" class="form-control"/>
					<br/>
					<input type="password" size="20" id="password" name="password" placeholder="Password" class="form-control"/>
					<br/>
					<input type="password" size="20" id="password2" name="password2" placeholder="Retype Password" class="form-control"/>
					<br/>
					<input type="submit" value="Register"  class="btn btn-default"/>
				</form>
				<br>
				<div class="login-help">
					<a href="<?php echo $base_url;?>account/loginform">Login</a> - <a href="<?php echo $base_url;?>account/forgotpasswordform">Forgot Password</a>
				</div>
			</div>
		</div>
	<div class="col-md-4"></div>
	</div>	
</div>