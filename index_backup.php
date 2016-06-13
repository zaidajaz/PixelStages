<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PixelStages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="styles/fonts.css" type="text/css">

    <script type="text/javascript">
    	function clearField(item){
    		item.placeholder = "";
    	}
    	function fillBack(item){
    		if(item.id == "loginemail"){
    			item.placeholder="Email";
    		}
    		else{
    			item.placeholder="Password";
    		}
    	}
    </script>
</head>
<body>

	<div class="container">
		<!-- Logo -->
		<div class="row xd-logorow">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<h1 class="xd-logo">PIXEL<label class="xd-logostages">STAGES</label></h2>
			</div>
			<div class="col-sm-2"></div>
		</div>

		<!--Login Details Section -->
		<div class="row xd-login-row">
			<div class="col-sm-4 col-md-4 col-xs-1"></div>
			<div class="col-sm-4 col-md-4 col-xs-10 xd-login-container">
				<img src="Assets/peoples.png" alt="people">
				<form method="post" action="">
				  <fieldset class="form-group">
				    <input type="email" onfocus="clearField(this);" onblur="fillBack(this);" class="form-control xd-login-input" id="loginemail" placeholder="Email">
				  </fieldset>
				  <fieldset class="form-group">
				    <input type="password" onfocus="clearField(this);" onblur="fillBack(this);" class="form-control xd-login-input" id="loginpassword" placeholder="Password">
				  </fieldset>
				  <fieldset class="form-group">
				    <input type="submit" value ="Let me in!" class="form-control xd-login-btn" id="loginpassword">
				    <small class="xd-forgot-password"><a href="#">Hey! I forgot my access details</a></small>
				  </fieldset>
				 </form>
			</div>
			<div class="col-sm-4 col-md-4 col-xs-1"></div>
		</div>
	</div>   



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>