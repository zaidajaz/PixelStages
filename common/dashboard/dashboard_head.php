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
    	
    	$('#searchBar').keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				$('#searchForm').submit();
			}
		});

		function addNote(e, input){
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) { 
			 	//window.location="dashboard.php";
			 	
			}
		}

		function clearPlace(input){
			input.placeholder = "";
		}
		function fillPlace(input){
			input.placeholder = $(input).data('placeholder');
		}

		function openInSpace(srclink){
			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$( "<div class='xd-space-active'>New Space</div>").insertBefore( ".xd-add-space" );
		}

		function showColorPlate(input){
			$(input).parent().find('.xd-color-plate').slideToggle();
		}

		function saveColor(input, id){
			var color = $(input).data('color');
			window.location = 'dashboard.php?color='+color+'&id='+id;
		}
		function CreateSpace(id,name){
			var jCode = "$('#space_content').show().load('details.php?id="+id+"');$('.xd-spaces-container').find('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive'); $(this).toggleClass('xd-space-inactive').toggleClass('xd-space-active');";
			
			var onclickcode ="onClick = " + "\""+jCode+"\"";

			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$( "<div "+onclickcode+" class='xd-space-active'>"+name+"</div>").insertBefore( ".xd-add-space" );
			$('#space_content').show().load('details.php?id='+id);
		}
		
    </script>
</head>
<body>
	<nav class="xd-navbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
					<img src="Assets/pixelstages.png">
				</div>
				<div class="col-lg-8 col-md-8 hidden-sm hidden-xs">
					<ul class="xd-menu-list">
						<li class="xd-menu-active-link"><a href="#">Leads and Contacts</a></li>
						<li><a href="#">Statistics</a></li>
						<li><a href="#">Manage</a></li>
						<li><a href="#">Users</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-11 col-xs-11">
					<div class="xd-user-img"></div>
					<div class="xd-user-hover-card">
						<ul class="xd-user-list">
						  <li class="xd-user-list-item-big">
						  	<img class="xd-user-dp" src="Assets/mustache.png" class="img-circle">
						  	<h2>Hi, <?php echo $_SESSION['username'] ?></h2><small><?php echo $_SESSION['email'] ?></small>
						  </li>
						  <li class="xd-user-list-item"><img src="Assets/manage-profile.png"><a href="#">Manage Profile</a></li>
						  <li class="xd-user-list-item"><img src="Assets/settings.png"><a href="#">Settings</a></li>
						  <li class="xd-user-list-item"><img src="Assets/usergreen.png"><a href="logout.php">Sign Out</a>
						  </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row xd-search-row">
			<div class="col-lg-8 col-md-8 hidden-sm hidden-xs">
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
				<form method="get" action="" id="searchform">
					<input type="text" class="xd-search-bar" id="searchBar" name="q" value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>">
				</form>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
				<div class="xd-advanced-search">
					<img src="Assets/mustache.png" class="xd-advance-image-moustache">
					<small>Advanced Search</small>
					<img src="Assets/arrowdown.png" class="xd-arrow-down">
				</div>
				<div class="xd-advance-search-hover-card">
					<img src="Assets/hover-triangle.png" class="xd-advance-hover-triangle">
					<form action="" method="post">
						<div class="xd-advance-search-container">
							<div class="xd-advance-left-inputs">
								<input type="text" class="xd-advance-input" onfocus="this.placeholder='';" onblur="this.placeholder='First Name';" name="advFirstName" placeholder="First Name">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='Email';" class="xd-advance-input" name="advEmail" placeholder="Email">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='City';" class="xd-advance-input" name="advCity" placeholder="City">
								<div class="xd-advance-input xd-advance-input-select">
									<select name="advStage" placeholder="Stage">
										<option>Stage 1</option>
										<option>Stage 2</option>
										<option>Stage 3</option>
									</select>									
								</div>

								<div class="xd-adv-seperator xd-adv-seperator-left"></div>
								<input type="submit" name="adv_search" value="Search" class="xd-advance-search-btn xd-adv-btn-left">
							</div>
							<div class="xd-advance-right-inputs">
								<input type="text" class="xd-advance-input" onfocus="this.placeholder='';" onblur="this.placeholder='Last Name';" name="advLastName" placeholder="Last Name">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='Phone';" class="xd-advance-input" name="advPhone" placeholder="Phone">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='State';" class="xd-advance-input" name="advState" placeholder="State">
								<div class="xd-advance-input xd-advance-input-select">
									<select name="advOwner" placeholder="Owner">
										<option>Owner 1</option>
										<option>Owner 2</option>
										<option>Owner 3</option>
									</select>
								</div>
								<div class="xd-adv-seperator"></div>
								<input type="submit" value="More" class="xd-advance-search-btn xd-adv-btn-right">
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<!-- Spaces Row -->
		<div class="row xd-spaces-row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="xd-spaces-container">
					<div onclick="$('#space_content').hide();$('.xd-spaces-container').find('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive'); $(this).toggleClass('xd-space-inactive').toggleClass('xd-space-active');" class="xd-space-active">
						Home
					</div>
					<div class="xd-add-space">
					 	<h1>+</h1>
					</div>
				</div>
			</div>
		</div>