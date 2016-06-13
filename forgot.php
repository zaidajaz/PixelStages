<?php 
	if(!isset($_SESSION))
		session_start();
	if(isset($_SESSION['username'])){
		header('Location: dashboard.php');
	}
include('common/login/login_header.php'); ?>

				<form method="post" action="">
				  <fieldset class="form-group">
				    <input type="email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" class="form-control xd-login-input" id="forgotemail" placeholder="Email">
				  </fieldset>
				  
				  <fieldset class="form-group">
				    <input type="submit" value ="Send me my details" class="form-control xd-login-btn xd-forgot-btn" id="forgotbtn">	
				  </fieldset>
				 </form>

<?php include('common/login/login_footer.php'); ?>