<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PixelStages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"> -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
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
    <script type="text/javascript" src="js/valid.js"></script>
</head>
<body class="xd-login-body">

	<div class="container">
		<!-- Logo -->
		<div class="row xd-logorow">
			<div class="col-sm-2"></div>
			<div class="col-sm-8" onclick="window.location='index.php'">
				<h1 class="xd-logo">PIXEL<label class="xd-logostages">STAGES</label></h2>
			</div>
			<div class="col-sm-2"></div>
		</div>

		<!--Login Details Section -->
		<div class="row xd-login-row">
			<div class="col-sm-4 col-md-4 col-xs-1"></div>
			<div class="col-sm-4 col-md-4 col-xs-10 xd-login-container">
				<img src="Assets/peoples.png" alt="people">