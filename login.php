<?php
	if(!isset($_SESSION))
	session_start();
	if(isset($_SESSION['username'])){
		header('Location: dashboard.php');
	}
 include('common/login/login_header.php'); ?>

				<form method="post" action="dashboard.php">
				  <fieldset class="form-group">
				    <input type="email" required autocomplete="off" onfocus="clearField(this);" onblur="fillBack(this);" class="form-control xd-login-input" id="loginemail" name="loginemail" placeholder="Email">
				  </fieldset>
				  <fieldset class="form-group">
				    <input type="password" required onfocus="clearField(this);" onblur="fillBack(this);" class="form-control xd-login-input" id="loginpassword" name="loginpassword" minlength="6" maxlength="12" placeholder="Password">
				  </fieldset>
				  <fieldset class="form-group">
				    <input type="submit" value ="Let me in!" class="form-control xd-login-btn" id="loginpassword">
				    <small class="xd-forgot-password"><a href="forgot.php">Hey! I forgot my access details</a></small>
				  </fieldset>
				 </form>

<?php include('common/login/login_footer.php'); ?>