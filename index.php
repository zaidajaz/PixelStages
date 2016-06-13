<?php 
if(!isset($_SESSION))
	session_start();

if(isset($_SESSION['username'])){
	header('Location: dashboard.php');
}

include('common/login/login_header.php'); 
include('lib/login-connect/fbloginSetup.php');
include('lib/login-connect/googleloginSetup.php');

?>

				<form method="post" action="">
				  <fieldset class="form-group">
				    <input type="button" value ="" class="form-control xd-facebook-login-btn" onclick="window.location='<?php echo $loginUrl ?>'">
				  </fieldset>
				  <fieldset class="form-group">
				    <input type="button" value ="" class="form-control xd-google-login-btn" onclick="window.location='<?php echo $authUrl; ?>'">
				  </fieldset>
				  <fieldset class="form-group">
				    <input type="button" onclick="window.location='login.php'" class="form-control xd-email-login-btn" id="loginpassword">
				  </fieldset>
				 </form>
				 <?php 
				 	if(isset($_GET['login']) && $_GET['login'] == 1){
				 ?> 
				 <div class="alert alert-danger" role="alert">
					 <strong>Alert: </strong> Please Login to Continue
				</div>
				<?php
					}
				?>

<?php include('common/login/login_footer.php'); ?>